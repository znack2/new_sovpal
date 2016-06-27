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
        view()->composer('pages._page', function ($view) {
            if(Request::route('page') == 'landing')
            {
                $view->with('reviews', Review::with('user')->orderBy('created_at')->take('3'));

//                ['user'=>[
//                    'type'=>'woman',
//                    'first_name'=>'fsgfsdg',
//                    'last_name'=>'sdgsdgsdg',],
//                'comment'=>'sdgsdgdsg',
//                'stars'=>'4',
//                ];

            }
        });

        view()->composer('*', function ($view) use ($auth) {
            $view->with('currentUser', isset($auth) ? $auth->user(): null);
            $view->with('currentRoute',Request::route() ? Request::route()->getName() : null);
        });

        view()->composer('index/index', function ($view) {
            $view->with('search',Request::input('keyword'));
            $view->with('item_type',['items','tools','materials']);

            if(Route::currentRouteName() == 'items')
            {
                $view->with('last_items',Item::where('type',strtolower(substr(Request::input('type'),0,-1)))->orderBy('created_at')->take(3));
                $view->with('tag_categories',Tag::with('elements','images')->where('type',strtolower(substr(Request::input('type'),0,-1)))->orderBy('name')->get(['id','name','item_count']));
            }
            elseif(Route::currentRouteName() == 'users')
            {
                $view->with('tagskills',Request::input('type') == 'profis' ? Tag::where('type','skill','images')->orderBy('name')->get(['id','name','item_count']) : null);
                $view->with('last_items',User::where('type',strtolower(substr(Request::input('type'),0,-1)))->orderBy('created_at')->take(3));
            }
            elseif(Route::currentRouteName() == 'groups')
            {
                $view->with('tagcategories',Tag::with('elements','images')->where('type','category')->orderBy('name')->get(['id','name','item_count']));
                $view->with('last_items',Group::orderBy('created_at')->take(3));
            }
        });

        view()->composer('profile/*', function ($view) {
            if($view->currentUser->type == 'owner'){
                $view->with('tagrooms',Tag::with('elements')->where('type','room')->orderBy('name')->get(['id','name','item_count']));
                if(Request::input('type')) {
                    $view->with('elements',Element::where('type',Request::input('type'))->orderBy('name')->get(['id','name']));
                }
                $view->with('item_conditions',['best','good','normal','poor']);
            }
            elseif($view->currentUser->type == 'shop')
            {
                $view->with('group_user_needs',['5','10','20','50']);
                $view->with('group_expires',['2','4','8','16']);
            }
            else
            {
                $view->with('tagrooms',Tag::with('elements')->where('type','room')->orderBy('name')->get(['id','name','item_count']));
            }
            $view->with('item_elements',Element::where('type','item')->orderBy('name')->lists('name','id'));
            $view->with('tagtools',Tag::where('type','tool')->orderBy('name')->get(['name','id']));
            $view->with('tagcategories',Tag::where('type','category')->orderBy('name')->get(['id','name']));
            $view->with('tagworks',Tag::where('type','works')->orderBy('name')->get(['id','name']));
            $view->with('tagskills',DB::connection('mysql')->table('tags')->where('type','skill')->orderBy('name')->get(['name','id']));
        });
    }

    public function register()
    {
        view()->share('appName', env('APP_NAME'));
        $app = $this->app;
        // $app->bind('Illuminate\Contracts\Auth\Registrar','App\Services\Registrar');
    }
}
// \DB::listen(function($sql, $bindings, $time) {});

// $view->with('addresses',Address::orderBy('street')->lists('street','house','corpus','id'));

//            $view->with('myRooms', isset($view->currentUser) ? $auth->user()->rooms()->get() : null);
//            $view->with('room_tags', isset($view->currentUser) ? Tag::where('type','room')->get(['name','id']) : null);