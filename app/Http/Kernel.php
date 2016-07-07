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
        // \Clockwork\Support\Laravel\ClockworkMiddleware::class,
        \App\Http\Middleware\Locale::class,
        \App\Http\Middleware\SessionTimeout::class,
    ];

// works only when you assign route
    protected $routeMiddleware = [
    //see only registred(other redirect login)
        'auth'          => \App\Http\Middleware\Authenticate::class,
    //user_only
        'auth.basic'    => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    //pages for guest(other redirect home)
        'guest'         => \App\Http\Middleware\RedirectIfAuthenticated::class,
    ];
}
