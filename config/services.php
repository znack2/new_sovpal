<?php

return [

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\Model\User\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],


    'facebook' => [
        'client_id'       => env('FACEBOOK_KEY'),
        'client_secret'    => env('FACEBOOK_SECRET'),
        'redirect'         => env('FACEBOOK_REDIRECT_URI'),
    ],

    'vkontakte' => [
        'client_id'       => env('VKONTAKTE_KEY'),
        'client_secret'    => env('VKONTAKTE_SECRET'),
        'redirect'         => env('VKONTAKTE_REDIRECT_URI'),
    ],

];
