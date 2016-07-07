<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class Admin
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if (! $this->auth->user() || ! $this->auth->user()->isAdmin()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }
        return $next($request);



          if(Auth::check() && (Auth::user()->role == 'admin')){
            return $next($request);
          } else {
            return view('errors.404');
          }



      if($this->auth->user()->hasRole('admin') && $request->getMethod() == 'DELETE')
        {
            \Session::flash('flash_message_delete','You don\'t have the permission to delete this record! Only Administrators can delete records.');
            return Redirect::back();
        }
        return $next($request);
    }
}
