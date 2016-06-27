<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
/*********************************************************************

                                one event many listener

**********************************************************************/
    protected $listen = [ ];
/*********************************************************************

                                many event one listener

**********************************************************************/
    protected $subscribe = [];

    public function boot(DispatcherContract $events)
        {
            parent::boot($events);
        }
}
