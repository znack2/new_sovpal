<?php

return [

    /* Supported: "smtp", "mail", "sendmail", "mailgun", "mandrill", "ses", "log"*/

    'driver' => env('MAIL_DRIVER', 'smtp'),

    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),

    'port' => env('MAIL_PORT', 587),

    'from' => ['address' => env('MAIL_FROM'), 'name' => env('MAIL_NAME')],

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),

    'sendmail' => '/usr/sbin/sendmail -bs',

    'pretend' => false,

    
    // MAIL_DRIVER=smtp
    // MAIL_HOST=mailtrap.io

];
