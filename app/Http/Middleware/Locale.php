<?php namespace App\Http\Middleware;

use App;
use Config;
use Session;
use Auth;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Locale
{
    public function handle($request, Closure $next)
    {    	
    	if(Auth::guest())
	    	{
	    		$raw_locale = Session::get('locale');     
 					
	    		if (in_array($raw_locale, Config::get('app.locales'))) 
		    		{  
	    		      	$locale = $raw_locale;                                
		    		}
	    		else 
		    		{
		    			$locale = Config::get('app.locale'); 
		    		}
	    	}
    	else{
	    		$locale = Auth::user()->language;
	    	}

        App::setLocale($locale); 
        return $next($request);
    }  
}



// if (Session::has('locale')) {
//     $locale = Session::get('locale', Config::get('app.locale'));
// } 
// else {
//     $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

//     if ($locale != 'ru' && $locale != 'en') {
//         $locale = 'en';
//     }
// }