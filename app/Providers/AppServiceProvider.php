<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Guard;

use App\Models\_partials\Address;
use App\Models\_partials\Review;
use App\Models\_partials\Element;
use App\Models\_partials\Tag;
use App\Models\Room\Room;
use App\Models\Item\Item;
use App\Models\User\User;
use App\Models\Group\Group;
use DB;
use Request;
use Route;

class AppServiceProvider extends ServiceProvider
{
    public function boot(Guard $auth)
    {
        $tags       = DB::connection('mysql')->table('tags');
        $elements   = DB::connection('mysql')->table('elements');
        $items      = DB::connection('mysql')->table('items');
        $users      = DB::connection('mysql')->table('users');
        $groups     = DB::connection('mysql')->table('groups');
        $addresses  = DB::connection('mysql')->table('addresses');
        // \DB::listen(function($sql, $bindings, $time) {});


        view()->composer('pages._page', function ($view) {
            if(Request::route('page') == 'landing')
            {
                $view->with('addresses',$addresses->orderBy('street')->lists('street','house','corpus','id','user_count'));
                // $view->with('reviews', Review::with('user')->orderBy('created_at')->take('3'));

//                ['user'=>[
//                    'type'=>'woman',
//                    'first_name'=>'fsgfsdg',
//                    'last_name'=>'sdgsdgsdg',],
//                    'comment'=>'sdgsdgdsg',
//                    'stars'=>'4',
//                ];
            }
        });



        view()->composer('*', function ($view) use ($auth) {
            $view->with('currentUser', isset($auth) ? $auth->user(): null);
            $view->with('currentRoute',Request::route() ? Request::route()->getName() : null);
            $view->with('myRooms', isset($auth) ? $auth->user()->rooms()->with('elements')->get() : null);
            $view->with('myElements', isset($auth) ?  $view->myRooms->elements() : null);
            $view->with('item_type',['items','tools','materials']);
            $view->with('group_type',['items','users']);
        });




        view()->composer('index/index', function ($view) {
            $view->with('search', Request::input('keyword'));

            if(Route::currentRouteName() == 'items')
            {
                $view->with('last_items',$items->where('type',strtolower(substr(Request::input('type'),0,-1)))->orderBy('created_at')->take(3));
                $view->with('categories',$tags->with('elements','images')->where('type',strtolower(substr(Request::input('type'),0,-1)))->orderBy('name')->get(['id','name','item_count']));
            } elseif(Route::currentRouteName() == 'users'){
                $view->with('skills',Request::input('type') == 'profis' ? Tag::where('type','skill','images')->orderBy('name')->get(['id','name','item_count']) : null);
                $view->with('last_items',$users->where('type',strtolower(substr(Request::input('type'),0,-1)))->orderBy('created_at')->take(3));
            } elseif(Route::currentRouteName() == 'groups'){
                $view->with('categories',$tags->with('elements','images')->where('type','category')->orderBy('name')->get(['id','name','item_count']));
                $view->with('last_items',$groups->orderBy('created_at')->take(3));
            }
        });




        view()->composer('profile/*', function ($view) {
            if($view->currentUser->type == 'owner'){
                if(Request::input('type')) {
                    $view->with('elements',$elements->where('type',Request::input('type'))->orderBy('name')->get(['id','name','item_count']));
                }
                $view->with('conditions',['best','good','normal','poor']);
            } elseif($view->currentUser->type == 'shop') {
                $view->with('group_user_needs',['5','10','20','50']);
                $view->with('group_expires',['2','4','8','16']);
            }
            
            $view->with('rooms',$tags->with('elements')->where('type','room')->orderBy('name')->get(['id','name','item_count']));
            $view->with('tools',$tags->where('type','tool')->orderBy('name')->get(['name','id','item_count']));
            $view->with('categories',$tags->where('type','category')->orderBy('name')->get(['id','name','item_count']));
            $view->with('works',$tags->where('type','work')->orderBy('name')->get(['id','name','item_count']));
            $view->with('skills',$tags->where('type','skill')->orderBy('name')->get(['name','id','item_count']));

            $view->with('elements',$elements->where('type','item')->orderBy('name')->lists('name','id','item_count'));
        });
    }

    public function register()
    {
        view()->share('appName', env('APP_NAME'));
    }
}




