<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
  
    protected $except = [];

    public function handle($request, Closure $next)
        {
            try {
                return parent::handle($request, $next);
            } catch (TokenMismatchException $e) {
                if ('testing' !== app()->environment()) {   return parent::handle($request, $next);}
                if ($request->wantsJson()) {	            return response()->json(['message' => 'Надо залогиниться'], 418);}
                								            return redirect()->route('pages',['page'=>'landing']);
            }
        }
}


