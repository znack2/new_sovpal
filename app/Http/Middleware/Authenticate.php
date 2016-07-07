<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use UrlException;
use App\Http\Middleware\AbstractMiddleware;

class Authenticate extends AbstractMiddleware
{
    public function handle($request, Closure $next)
    {
        //check url
        if( ! preg_match('/[^a-z\-_]+/', $request)) {
            throw new UrlException;
        }
        //check first visit
        if(!$this->session->has('first_visit'))
            $this->session->put('first_visit',time());
        elseif(time() - $this->session->get('first_visit') > $this->getTimeOut()){
            $this->session->forget('first_visit');
        }
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->route('pages',['page'=>'landing']);
            }
        }
        return $next($request);
    }

    protected function getTimeOut()
        {
            return (env('TIMEOUT')) ?: $this->timeout;
        }
}