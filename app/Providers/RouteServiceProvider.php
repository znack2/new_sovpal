<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace      = 'App\Http\Controllers';
    protected $authnamespace  = 'App\Http\Controllers\Auth';

    public function boot(Router $router)
    {
        $router->model('group',         'App\Models\Group\Group');
        $router->model('user',          'App\Models\User\User');
        $router->model('item',          'App\Models\Item\Item');
        $router->model('room',          'App\Models\Room\Room');
        $router->model('element',       'App\Models\_partials\Element');


        $router->pattern('id', '[0-9]+');
        $router->pattern('tag', '[A-Za-z]+');
        $router->pattern('hash', '[a-z0-9]+');
        $router->pattern('hex', '[a-f0-9]+');
        $router->pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
        $router->pattern('string', '[a-zA-Z0-9]+');
        $router->pattern('username', '^\b[a-z\pN\-\_\.]+\b$');
        $router->pattern('slug', '[a-z0-9-]+');
        $router->pattern('file', '(.*)');
        
       parent::boot($router);
    }

    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/Routes.php');
            require app_path('Http/CrudRoutes.php');
            // require app_path('Http/Adminroutes.php');
        });

        $router->group(['namespace' => $this->authnamespace], function ($router) {
            require app_path('Http/AuthRoutes.php');
        });       
    }
}
