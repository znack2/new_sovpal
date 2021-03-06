<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;
use App\Http\Middleware\AbstractMiddleware;

class SessionTimeout extends AbstractMiddleware
{
    protected $timeout = 900;

    public function handle($request, Closure $next)
        {
            if(!$this->session->has('lastActivityTime'))
                $this->session->put('lastActivityTime',time());
            elseif(time() - $this->session->get('lastActivityTime') > $this->getTimeOut()){
                $this->session->forget('lastActivityTime');
                Auth::logout();
                return redirect()->route('pages',['page'=>'landing'])->withErrors(['You had not activity in '.$this->timeout/60 .' minutes.']);
            }
            return $next($request);
        }
 
    protected function getTimeOut()
        {
            return (env('TIMEOUT')) ?: $this->timeout;
        }
}


