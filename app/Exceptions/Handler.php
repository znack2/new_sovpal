<?php namespace App\Exceptions;

use Exception;
use App\Exceptions\Exception;
use Whoops;
use Log;
use App\Services\Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\Debug\ExceptionHandler as SymfonyDisplayer;

class Handler extends ExceptionHandler
{
    protected $redirect;
    protected $message;
    protected $mail;
    protected $log;

    public function __construct(Mail $mail,Log $log)
      {
          $this->mail = $mail;
          $this->log = $log;
      }

    protected $dontReport = [
        // TokenMismatchException::class,
        // HttpException::class,
        // ModelNotFoundException::class,
        // AuthorizationException::class,
        // ValidationException::class
        // 'Symfony\Component\HttpKernel\Exception\HttpException'
        ];

    public function report(Exception $e)
        {
          if ($e instanceof \Exception) {
                  $this->log->error($e);
                  //  send to bagsnag sentry
                  // $this->notifier->notify('Error: '.get_class($e), $e->getMessage());
                  $tis->mail->queue('emails.exception', ['message' => $this->getMessage($e)], function ($mail) use ($user) {
                      $mail->to('your email', 'your name')->subject('Error');
                  });
              }
          Bugsnag::notifyException($exception, [
            'account' => [
                'paying' => true,
                'name' => 'Acme Co'
            ]
          ], 'info');
           parent::report($e);
        }

        
    //SHOW TEMPLATES
    public function render($request, Exception $e)
        {    
          // dd($e);
            $this->status = $this->getStatusCode($e);
            $this->message = $this->getMessage($e);
            $this->log->debug($this->message);
            $this->redirect = $request->fullUrl();

          switch($e)
          {
            case ($e instanceof Exception):
                 redirect()->back()->withErrors(['message' => $this->message], $status]);
                 break
            case ($this->isHttpException($e)):
                if (config('app.debug', false) || app()->environment() !== 'testing' && view()->exists("errors.{$status}")) {
                     response()->view("errors.{$status}", ['message' => $this->message], $this->status);
                    }
                elseif ($request->wantsJson()) {
                     response()->json(['message' => $this->message], $this->status);
                    }
                else{  
                     $this->renderExceptionWithWhoops($request,$e)
                }
                 break;
            default:
                return (new SymfonyDisplayer(config('app.debug')))->createResponse($e);
            }
            // flash('alert', $this->message);
            return parent::render($request, $e);
          }

       //SETUP STATUS AND MESSAGES
    public function render($request, Exception $e)
      {
        if ($this->isHttpException($e))
        {
          return $this->renderHttpException($e);
        }
        else
        {
          return parent::render($request, $e);
        }

         //show debug 
          if (config('app.debug')) {
              return parent::render($request, $e);
          }
          //default error
              return (new SymfonyDisplayer(config('app.debug')))->createResponse($e);
          //show template
          if ($e instanceof CustomException) {
              return response()->view('errors.custom', [], 500);
          }
          //work with message
          return $this->handle($request, $e);
      }





    //setup status and message for each exception
    public function hundle($request, Exception $e)
      {
            //basis exception
            if ($e instanceOf CribbbException) {
                //from extra exception
                $data   = $e->toArray($e);
                $status = $e->getStatus($e);
            }
            //change status and message
            if ($e instanceOf NotFoundHttpException) {
                    $data = array_merge([
                        'id'     => 'not_found',
                        'status' => '404'
                    ], config('errors.not_found'));
             
                    $status = 404;
                }
            return response()->json($data, $status);
      }

    protected function getStatusCode(\Exception $e)
        {
          switch($e)
          {
            case ($e instanceof HttpException) :
                return $e->getStatusCode();
                break;
            case ($e instanceof isUnauthorizedException ) :
                return 403;
                break;      
            case ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) :
                return 404;
                break;              
            case ($e instanceof MethodNotAllowedHttpException) :
                return 405;
                break;
            case ($e->getStatusCode() >= '500') :
                return 500;
                break;
            }
        }

    protected function getMessage(\Exception $e)
       {
          switch($e)
          {
              case ($e instanceof DatabaseException):
                  $message =  $e->getMessage();
                  break
              case ($e instanceof ModelNotFoundException):
                  $message =  trans('errors.model_not_found');
                  break
              case($e instanceof Exception) 
                   $message =  trans('errors.general_exception');
                   break
              case ($e instanceof ModelNotFoundException):
                  $message =  trans('errors.model_not_found');
                  break
              case ($this->isUnauthorizedException($e)):
                  $message =  trans('errors.model_not_found');
                  break
              case ($e instanceof TokenMismatchException):
                $message =  trans('errors.invalid_token');
                 break
              case ($e instanceof HttpResponseException):
                $message =  trans('errors.invalid_url');
                  break
              case ($e instanceof PolicyException):
                  $message =  trans('errors.action_for_reason');
                  break
              case ($e instanceof BanException):
                  $message =  trans('errors.user_banned_for_reason');
                  break
              case ($this->isUnauthorizedException($e)):
                  $message =  trans('errors.unauthorized');
                  break
              case($e instanceof EntityNotFoundException):
                 $message =  trans('errors.not_found_entity');
                  break
               case ($e instanceof NotFoundHttpException):
                  $message =  trans('errors.not_found');
                  break
               case ($e instanceOf MethodNotAllowedHttpException):
                  $message =  trans('errors.method_not_allowed');
                  break
               default: $message = trans('errors.something_wrong');
                  return sprintf($message, $e->getMessage());
          }
       }

    protected function renderExceptionWithWhoops($request,Exception $e)
        {
            $whoops = new \Whoops\Run;

            if ($request->ajax()) {
                $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler());
            } else {
                $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
            }
     
            return new \Illuminate\Http\Response(
                $whoops->handleException($e),
                $this->status,
                $e->getHeaders()
            );    
        }

    protected function renderHttpException(HttpException $e)
    {
      if (view()->exists('errors.'.$e->getStatusCode()))
      {
        return response()->view(
          'errors.'.$e->getStatusCode(),
          ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString(), 'debug' => config('app.debug')],
          $e->getStatusCode()
        );
      }
      else
      {
        return (new SymfonyDisplayer(config('app.debug')))->createResponse($e);
      }
    }
}


 //if($event->getRequest()->headers->has('content-type') === MediaTypeInterface::JSON_API_MEDIA_TYPE) {
// case(substr($e->getRequest()->getPathInfo(), 0, 4) === '/api') 
//      $response = $this->container->get('api_service')->getErrorResponse($e);
//      $e->setResponse($response);
//      break



