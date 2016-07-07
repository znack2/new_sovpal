<?php namespace App\Http\Middleware;

use App;
use Session;
use Closure;
use App\Http\Middleware\AbstractMiddleware;
use Carbon\Carbon;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Support\Facades\Config;

class Locale extends AbstractMiddleware
{
    public function handle($request, Closure $next)
    {    	
    	if(Auth::guest() || $this->session->has('locale'))
	    	{
	    		$locale = in_array($this->session->get('locale'), Config::get('app.locales')) 
		    		? $this->session->get('locale') 
		    		: Config::get('app.locales'); 
	    	}
    	else{
	    		$locale = $this->auth->user()->language;
	    		//  $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
	    	}
        app()->setLocale($locale); 
        return $next($request);







        $sessionAppLocale = session()->get('applocale');

        if (session()->has('applocale') and array_key_exists($sessionAppLocale, Config::get('languages'))) {
            app()->setLocale($sessionAppLocale);
            setlocale(LC_TIME, $sessionAppLocale);
            Carbon::setLocale(\Locale::getPrimaryLanguage($sessionAppLocale));

            return $next($request);
        }

        $fallbackLocale = Config::get('app.fallback_locale');

        app()->setLocale($fallbackLocale);
        setlocale(LC_TIME, $fallbackLocale);
        Carbon::setLocale(\Locale::getPrimaryLanguage($fallbackLocale));
		return $next($request);
    }  
}


