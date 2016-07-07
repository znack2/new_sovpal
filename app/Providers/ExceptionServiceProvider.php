<?php namespace Illuminate\Exception;

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;
use Illuminate\Support\ServiceProvider;

class ExceptionServiceProvider extends ServiceProvider 
{
    public function boot()
    {
        $app = $this->app;

        // $handler->error(function(\SampleException $e) use ($log)
        // {
        //     \Session::flash('foo', 'bar');
        //     return \Redirect::to('sandbox');
        // });
    }

    public function register()
    {
        $this->registerDisplayers();

        $this->registerHandler();
    }

    protected function registerDisplayers()
    {
        $this->registerPlainDisplayer();

        $this->registerDebugDisplayer();
    }

    protected function registerHandler()
    {
        $this->app['exception'] = $this->app->share(function($app)
        {
            return new Handler($app, $app['exception.plain'], $app['exception.debug']);
        });
    }

    protected function registerPlainDisplayer()
    {
        $this->app['exception.plain'] = $this->app->share(function($app)
        {
            if ($app->runningInConsole())
            {
                return $app['exception.debug'];
            }
            else
            {
                return new PlainDisplayer;
            }
        });
    }

    protected function registerDebugDisplayer()
    {
        $this->registerWhoops();

        $this->app['exception.debug'] = $this->app->share(function($app)
        {
            return new WhoopsDisplayer($app['whoops'], $app->runningInConsole());
        });
    }

    protected function registerWhoops()
    {
        $this->registerWhoopsHandler();

        $this->app['whoops'] = $this->app->share(function($app)
        {
            with($whoops = new Run)->allowQuit(false);

            $whoops->writeToOutput(false);

            return $whoops->pushHandler($app['whoops.handler']);
        });
    }

    protected function registerWhoopsHandler()
    {
        if ($this->shouldReturnJson())
        {
            $this->app['whoops.handler'] = $this->app->share(function()
            {
                return new JsonResponseHandler;
            });
        }
        else
        {
            $this->registerPrettyWhoopsHandler();
        }
    }

    protected function shouldReturnJson()
    {
        return $this->app->runningInConsole() || $this->requestWantsJson();
    }

    protected function requestWantsJson()
    {
        return $this->app['request']->ajax() || $this->app['request']->wantsJson();
    }

    protected function registerPrettyWhoopsHandler()
    {
        $this->app['whoops.handler'] = $this->app->share(function()
        {
            with($handler = new PrettyPageHandler)->setEditor('sublime');

            return $handler;
        });
    }

}