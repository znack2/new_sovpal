<?php namespace App\Http\Middleware;

use Closure;
use App\Http\Middleware\AbstractMiddleware;

class RedirectIfAuthenticated extends AbstractMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            return redirect()->route('groups');
        }
        return $next($request);
    }
}

