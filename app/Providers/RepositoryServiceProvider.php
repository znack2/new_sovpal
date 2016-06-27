<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
    	$app = $this->app;

    	$app->bind('App\Models\Filters\AbstractInterface', 	            'App\Models\Filters\AbstractRepo');
        
    	$app->bind('App\Models\Item\ItemInterface',     	            'App\Models\Item\ItemRepo');
        $app->bind('App\Models\User\UserInterface',                     'App\Models\User\UserRepo');
        $app->bind('App\Models\Group\GroupInterface',                   'App\Models\Group\GroupRepo');
        $app->bind('App\Models\Room\RoomInterface',                     'App\Models\Room\RoomRepo');

        // $app->bind("App\Models\ItemInterface",function(){
        //     if(Auth::user()){
        //         return new ItemRepository(Auth::user()->item);
        //     }else{
        //         return new ItemRepository(new Item());
        //     }
        // });
    }
}
