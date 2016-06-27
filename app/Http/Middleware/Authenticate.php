<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                // return response('Unauthorized.', 401);
                return redirect()->route('pages',['page'=>'landing']);
            } else {
                return redirect()->route('pages',['page'=>'landing']);
            }
        }
        return $next($request);
    }
}