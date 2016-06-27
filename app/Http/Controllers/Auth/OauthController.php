<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User\User;
use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
// use Laravel\Socialite\Contracts\Factory as Socialite;
use Session;
use Auth;
use Socialite;
use Illuminate\Support\Collection;

 class OauthController extends Controller
 {
     protected $socialite;
     protected $auth;
     protected $user;

    public function __construct(Socialite $socialite, Guard $auth)
     {
         $this->socialite = $socialite;
         $this->auth      = $auth;
     }
/**
 *
 *  get Page 
 *  
 *
 */
     public function getPage()
     {
         if( Session::get('provider') !== 'facebook') {
             Auth::logout();
             Session::flush();
             return redirect('/auth/facebook');
         }
         return view('api.facebook')->withDetails($this->getData());
     }
/**
 *
 *  get Data
 *  
 *
 */
     private function getData()
     {
        $data = Facebook::get('/me?fields=id,name,cover,email,gender,first_name,last_name,locale,timezone,link,picture', Auth::user()->getAccessToken());
       return json_decode($data->getGraphUser(),true);
     }
/**
 *
 *  authenticate
 *  
 *
 */
     public function authenticate(Request $request, $provider)
     {
         return $this->execute(($request->has('code') || $request->has('oauth_token')), $provider);
     }
/**
 *
 *  execute
 *  
 *
 */
     public function execute($request, $provider)
     {
         if (! $request) {
             return $this->getAuthorizationFirst($provider);
         }

         $user = $this->findByProviderIdOrCreate($this->getSocialUser($provider), $provider);
         $this->auth->loginUsingId($user->id);

         return redirect('/api');
     }
/**
 *
 *  find By ProviderId Or Create
 *  
 *
 */
     public function findByProviderIdOrCreate($userData, $provider)
     {
         Session::put('provider', $provider);
         $email = $this->isEmailExists($userData->getEmail()) ? null : $userData->getEmail();
         $username = $this->isUsernameExists($userData->getNickName()) ? null : $userData->getNickName();
         $tokenSecret = property_exists($userData, "tokenSecret") ? $userData->tokenSecret : null;

         if (!$user = User::where('provider_id', $userData->id)->first())  {
             $user = User::create([
                 'fullname'      => $userData->getName(),
                 'username'      => $username,
                 'provider_id'   => $userData->getId(),
                 'avatar'        => $userData->getAvatar(),
                 'email'         => $email,
                 'provider'      => $provider,
                 'oauth_token'   => $userData->token,
                 'oauth_token_secret'   => $tokenSecret
             ]);
             Session::put('provider', $provider);
         }
         return $user;
     }
 /**
 *
 *  check if Username Exists
 *  
 *
 */
     private function isUsernameExists($username = null)
     {
         $username = User::whereUsername($username)->first()['username'];

         return (! is_null($username)) ? true : false;
     }
/**
 *
 *  check is Email Exists
 *  
 *
 */
     private function isEmailExists($email = null)
     {
         $email = User::whereEmail($email)->first()['email'];

         return (! is_null($email)) ? true : false;
     }
/**
 *
 *  check If User Needs Updating
 *  
 *
 */
     public function checkIfUserNeedsUpdating($userData, $user)
     {
         $socialData = [
             'avatar' => $userData->getAvatar(),
             'fullname' => $userData->getName(),
             'username' => $userData->getNickName(),
         ];

         $dbData = [
             'avatar' => $user->avatar,
             'fullname' => $user->fullname,
             'username' => $user->username,
         ];

         if (! empty(array_diff($dbData, $socialData))) {
             $user->avatar = $userData->getAvatar();
             $user->fullname = $userData->getName();
             $user->username = $userData->getNickName();
             $user->save();
         }
     }
/**
 *
 *  get Authorization First
 *  
 *
 */
     private function getAuthorizationFirst($provider)
     {
         return $this->socialite->driver($provider)->redirect();
     }
/**
 *
 *  Password remind
 *  
 *
 */
     private function getSocialUser($provider)
     {
         return $this->socialite->driver($provider)->user();
     }
/**
 *
 *  redirect Provider
 *  
 *
 */
     public function redirectProvider(Request $request)
     {
         $provider = $request->get('provider');

         if(!config('services'.$request->get($provider)))
         {abort('404');}

         logger()->info(__METHOD__);
         logger()->info(sprintf('provider:%s', $request->get($provider)));

         $oauth = Socialite::driver($request->get($provider))->redirect();

         if ($request->has('code')){
             // $user = $provider->user();
             return $oauth->stateless()->user();
         } else {
             return $oauth->scopes(['public_profile','user_friends'])->redirect();
         }
     }
/**
 *
 *  handle Provider Callback
 *  
 *
 */
     public function handleProviderCallback(Request $request)
     {
         $provider = $request->get('provider');

         if (!$request->has('code')) {
             return Socialite::driver($provider)->redirect();
         }

         try{
             $providerUser = Socialite::driver($provider)->user();
             logger()->info('PROVIDER USER:'.serialize($providerUser));
         }catch(Exception $e){
             return redirect('login/'.$provider);
         }

         Session::put('state',$request->get('state'));

         $alreadyUser = User::where('provider_id',$providerUser->getId())->first();

         if($alreadyUser === null ){
             // return Socialite::driver($provider)->redirect();
             return redirect()->route('auth.register');
         }

         Auth::login($alreadyUser,true);
         flash(trans('sovpal.flash.Login'),'success');
         Session::put('provider',$providerUser);
         return redirect()->intended($this->redirectPath());
     }

 }












