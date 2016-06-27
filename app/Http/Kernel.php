<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    //works always
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        // TODO: re-enable this for production
        // \App\Http\Middleware\VerifyCsrfToken::class,
        // \Krucas\Notification\Middleware\NotificationMiddleware::class,
        \App\Http\Middleware\Locale::class,
        \App\Http\Middleware\SessionTimeout::class,
        // \Clockwork\Support\Laravel\ClockworkMiddleware::class,
    ];

// works only when you assign route
    protected $routeMiddleware = [
    //see only registred(other redirect login)
        'auth'          => \App\Http\Middleware\Authenticate::class,
    //user_only
        'auth.basic'    => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    //pages for guest(other redirect home)
        'guest'         => \App\Http\Middleware\RedirectIfAuthenticated::class,
    //only for specific user_id
        'private'         => \App\Http\Middleware\PrivateLink::class,
    //delete only admin
        // 'canDelete'     => \App\Http\Middleware\DeleteIfAdmin::class,
    //see only role = 
        // 'role'          => \App\Http\Middleware\Role::class,
        // 'type'          => \App\Http\Middleware\Type::class,
    //see only admin
        // 'admin'         => \App\Http\Middleware\Admin::class,
    ];
}
