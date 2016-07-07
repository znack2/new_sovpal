<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use SocialiteProviders\Manager\SocialiteWasCalled;
use JhaoDa\SocialiteProviders\Odnoklassniki\OdnoklassnikiExtendSocialite;
use SocialiteProviders\VKontakte\VKontakteExtendSocialite;

class EventServiceProvider extends ServiceProvider
{
/*********************************************************************

                                one event many listener

**********************************************************************/
    protected $listen = [ 
          SocialiteWasCalled::class => [
            'OdnoklassnikiExtendSocialite::class',
            'VKontakteExtendSocialite@handle',
        ],	         
          SocialiteWasCalled::class => [
	      	'ItemEvent::class',
          'UserEvent::class',
          'RoomEvent::class',
	      	'GroupEvent::class',
		],
  ];
/*********************************************************************

                                many event one listener

**********************************************************************/
    protected $subscribe = [];

    public function boot(DispatcherContract $events)
        {
            parent::boot($events);

          $events->listen('auth.attempt', function ($credentials, $remember, $login) {
                auth->user()->checkBanned();
                auth->user()->checkVerified();
            });
          
          $events->listen('auth.login', function ($user, $remember) {
                $user->update_last_login();
             });

        }
}
