<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use UrlException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

class AbstractMiddleware
{
	protected $auth;
	protected $session;

    public function __construct(Guard $auth,Store $session)
    {
        $this->auth = $auth;
        $this->session=$session;
    }
}