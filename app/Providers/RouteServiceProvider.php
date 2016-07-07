<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Models\User\User;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace       = 'App\Http\Controllers';
    protected $authnamespace   = 'App\Http\Controllers\Auth';
    protected $adminnamespace  = 'App\Http\Controllers\Admin';

    public function boot(Router $router)
    {
        $router->model('group','App\Models\Group\Group', function () {
            throw new NotFoundHttpException;
        });        
        $router->model('item','App\Models\Item\Item', function () {
            throw new NotFoundHttpException;
        });        
        $router->model('room','App\Models\Room\Room', function () {
            throw new NotFoundHttpException;
        });        
        $router->model('element','App\Models\_partials\Element', function () {
            throw new NotFoundHttpException;
        });

        $router->bind('user', function ($value) {
            // filter query
            $result = Cache::remember(array_keys($value), 1, function(){ 
               User::with()->find($value)->where('id', auth()->id)->orWhere('private',false)->first()});

            if(!$result){
                throw new NotFoundHttpException('Private profile');
            } else {
               return $result; 
            }
        });

        $router->pattern('id', '[0-9]+');
        $router->pattern('tag', '[A-Za-z]+');
        $router->pattern('hash', '[a-z0-9]+');
        $router->pattern('hex', '[a-f0-9]+');
        $router->pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
        $router->pattern('string', '[a-zA-Z0-9]+');
        $router->pattern('username', '^\b[a-z\pN\-\_\.]+\b$');
        $router->pattern('slug', '[a-z0-9-]+');
        $router->pattern('file', '(.*)');
        $router->pattern('provider', 'facebook|ok|vkontakte');
        
       parent::boot($router);
    }

    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/Routes.php');
            require app_path('Http/CrudRoutes.php');
        });

        $router->group(['namespace' => $this->authnamespace], function ($router) {
            require app_path('Http/AuthRoutes.php');
        }); 

        $router->group(['namespace' => $this->adminnamespace], function ($router) {
            require app_path('Http/AdminRoutes.php');
        });       
    }
}
