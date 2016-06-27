<?php namespace App\Http\Controllers\Auth;

use App\Models\User\User;
use Validator;
use Session;
use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ActivateRequest;
use App\Http\Requests\Auth\RegistrationRequest;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $loginPath = '/'; 
    protected $loginBy = strpos($login, '@') > 1 ? 'email' : 'username';

    public function __construct(User $user)
      {
          $this->model  = $user;
      }
/**
 *
 *  Registration form 
 *  
 *  TODO:
 *  - oauth show just extra input 
 *
 */
    public function Register()
        {
            $provider = Session::has('provider');

            $form  = [
                'title'   => $provider != null ? 'Add little bit more info about yourself' : 'Feel yourself like at home !',
                'model'   => 'auth',
                'method'  => 'register',
                'button'  => 'Complete',
                'type'    => '',
                'provider'=> $provider
            ];

            return view('pages._form',$form);
        }
/**
 *
 *  Confiramation form 
 *
 */
    public function getConfirmation()
        {
            $form  = [
                'title'  => 'Confirmation Code',
                'model'  => 'auth',
                'method' => 'code',
                'button' => 'confirm',
                'type'   => 'panel',
            ];
             return view('pages._form',$form);
        }
/**
 *
 *  login User
 *  
 */
    public function postLogin(LoginRequest $request)
      {
        $loginBy = strpos($request->input('email'), '@') > 1 ? 'email' : 'username';
        $validate = Auth::attempt([$loginBy => $request->input('email'), 'password' => $request->input('password')],$request->has('remember'));
      // check if user not verified show message if yes login
            try {
                $this->model->checkBanned();
                $this->model->update_last_login();
                flash(trans('sovpal.flash.Login'),'success');
                return redirect()
                      ->intended($this->redirectPath());
            } catch (\Exception $e) {
                $message = sprintf("Error doing something %s", $e->getMessage());
                Log::debug($message);
                flash(trans('sovpal.flash.LoginError'),'error');
                return redirect($this->loginPath())
                      ->withInput($request->only('email', 'remember'))
                      ->withErrors(['email' => $this->getFailedLoginMessage()]);
            }
      }
/**
 *
 *  create new User
 *
 */
    public function postRegistr(RegistrationRequest $request)
      {
        try {
            $this->model->createUser($request->all());
            $this->sendMail($request, 'layout.emails.subscribe', 'Complete your registration');
            flash(trans('sovpal.flash.verify'),'info');
            return redirect($this->redirectPath());
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
        }
      }
/**
 *
 *  confirmation 
 *  TODO:
 *  check verify code if expire or not valid show error( send mail again )
 */
    public function postConfirmation(Request $request)
      {
          try {
            $this->model->activateUser($request->input('code'));
            flash(trans('sovpal.flash.Confirm'),'success');
            return redirect()->route('groups');
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
        }
      }
/**
 *
 *  Logout 
 *
 */
    public function Logout()
      {
        try {
            Auth::logout();
            flash(trans('sovpal.flash.Logout'),'success');
            return redirect('/')->with('alert', 'You are logged out.');
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
      }
}
