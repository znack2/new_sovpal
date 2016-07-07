<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider{

    protected $defer = false;

    public function register()
    {
	    $this->app->bind('flash', function ($app){
	        return new Flash($app->make('flash'));
	    });

	    $this->app->singleton('flash', function () {
	    	return $this->app->make('App\Services\Flash\FlashService');
	    });
    }
} 