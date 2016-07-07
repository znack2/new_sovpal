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

use App\Services\OauthService;
use Socialite;
use App\Exceptions\SocialAuthException;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $loginPath = '/'; 
    protected $loginBy = strpos(Request::input('login'), '@') > 1 ? 'email' : 'username';
    protected $credentials = [$loginBy => $request->input('login'), 'password' => $request->input('password')];

    public function __construct(User $user)
      {
          $this->model  = $user;
      }
/**
 *
 *  Registration form 
 *
 */
    public function getRegister()
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
            return view('pages._form',compact('form'));
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
             return view('pages._form',compact('form'));
        }
/**
 *
 *  create new User
 *
 */
    public function postRegister(RegistrationRequest $request)
      {
        try {
            $user = $this->model->createUser($request->all());
            $this->mail->send_Activation($user);
            flash('Mail has been send','success');
            return redirect($this->redirectPath());
        } catch (MailException $e) {
            flash('Mail has not been send','error');
            return redirect($this->redirectPath());
        }
      }
/**
 *
 *  confirmation 
 *  
 */
    public function postConfirmation(ActivateRequest $request,$code)
      {
          try {
            $user = $this->model->activateUser($code);
            flash('Confirm','success');
            Auth::login($user);
            return redirect($this->redirectPath());
        } catch (\Exception $e) {
            flash('Confirm','error');
            return redirect($this->redirectPath());
        }
      }
/**
*
*  social login User
*  
*/
  public function postSocialLogin($provider)
    {
          if($provider){
              try {
                  Socialite::with($provider)->redirect();
              } catch (SocialAuthException $e) {
                  flash('Confirm','success');
                  return redirect()->intended($this->redirectPath());
              }
          } else {
              return redirect()->intended($this->redirectPath());
          }
    }
/**
*
*  login User
*  
*/
  public function callback(OauthService $oauth, $provider)
      {
          $user = Socialite::driver($provider)->user();
          $user->getId();
          $user->getNickname();
          $user->getName();
          $user->getEmail();
          $user->getAvatar();
          $user = $oauth->createOrGetUser($driver, $provider);

          $this->auth->login($user, true);
          return redirect()->intended($this->redirectPath());
      }
}
