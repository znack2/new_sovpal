<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MAIL\CssInlinerPlugin;

class MailServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->app['mail']->getSwiftMailer()->registerPlugin(new CssInlinerPlugin());
    }

    public function register()
    {
        $this->app->bind('App\Services\MAIL\AbstractMailerInterface',             'App\Services\MAIL\AbstractMailer');
        $this->app->bind('App\Services\MAIL\Auth\AuthMailerInterface',            'App\Services\MAIL\Auth\AuthMailer');
        $this->app->bind('App\Services\MAIL\Payment\PaymentMailerInterface',      'App\Services\MAIL\Payment\PaymentMailer');
        $this->app->bind('App\Services\MAIL\Subscribe\SubscriberInterface',       'App\Services\MAIL\Subscribe\Subscriber');


        // $this->app['mail'] = $app->share(function() use ($app)
        // {
        //     $config = $app['config'];

        //     $twilio = new Services_Twilio(
        //         $config->get('twilio.account_id'),
        //         $config->get('twilio.auth_token')
        //     );

        //     $notifier = new SmsNotifier( $twilio );

        //     $notifier->from( $config['twilio.from'] )
        //              ->to( $config['twilio.to'] );

        //     return $notifier;
        // });
    }

    public function provides()
    {
        // return ['mail'];
    }
}