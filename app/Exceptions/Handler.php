<?php namespace App\Exceptions;

use Exception;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;


class Handler extends ExceptionHandler
{

	protected $dontReport = [
	      AuthorizationException::class,
	      HttpException::class,
	      ModelNotFoundException::class,
	      ValidationException::class,
	  ];

	public function report(Exception $e)
      {
         parent::report($e);
      }

	public function render($request, Exception $e)
      {    
      	 dd($e);
      	 return parent::render($request, $e);
      }
}