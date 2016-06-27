<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

class FirstVisit 
{
    protected $session;

    public function __construct(Store $session)
        {
            $this->session=$session;
        }

    public function handle($request, Closure $next)
        {
            //if not first visit -
            //if first visit -
            if(!$this->session->has('first_visit'))
                $this->session->put('first_visit',time());
            elseif(time() - $this->session->get('first_visit') > $this->getTimeOut()){
                $this->session->forget('first_visit');
            }
            return $next($request);
        }
}


