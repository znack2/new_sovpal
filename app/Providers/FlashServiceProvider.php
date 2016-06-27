<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider{

    protected $defer = false;

    public function register()
    {
	    $this->app->singleton('flash', function () {return $this->app->make('App\Services\Flash\FlashNotifier');});
    }
} 