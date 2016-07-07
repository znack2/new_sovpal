<?php namespace App\Services;

use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Session;
use Auth;
use Socialite;
use Illuminate\Support\Collection;
use App\Models\User\SocialAccount;
use App\Models\User\User;
use Exception;
use App\Exceptions\SocialAuthException;

 class OauthService 
 {
     protected $socialite;
     protected $auth;
     protected $user;

    public function __construct(Socialite $socialite, Guard $auth)
     {
         $this->socialite = $socialite;
         $this->auth      = $auth;
     }

     public function createOrGetUser($providerObj, $providerName)
        {
            try {
                $providerUser = $providerObj->user();

                $account = SocialAccount::whereProvider($providerName)
                                ->whereProviderUserId($providerUser->getId())
                                ->first();

                if ($account) {
                    return $account->user;
                } else {
                    $account = new SocialAccount([
                        'provider_user_id' => $providerUser->getId(),
                        'provider' => $providerName]);

                    $user = User::whereEmail($providerUser->getEmail())->first();

                    if (!$user) {
                        $user = User::create([
                            'email' => $providerUser->getEmail(),
                            'username' => $providerUser->getNickname(),
                            'name' => $providerUser->getName(),
                        ]);
                    }

                    $account->user()->associate($user);
                    $account->save();

                    return $user;
                }
            } catch (Exception $e) {
                throw new SocialAuthException("failed to authenticate with $provider");
            }
        }

        // $socialUserInfo = Socialite::driver($provider)->user();
// $account = User::firstOrCreate(['email' => $socialUserInfo->getEmail()]);
// if (is_null($account->socialProfile)) {
//     $socialProfile = new SocialAccount;
//     $account->socialProfile()->save($socialProfile);
// }
// $providerField = "{$provider}_id";

// $account->socialProfile->$providerField = $socialUserInfo->getId();
// $account->socialProfile->save();

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
 *  handle Provider Callback
 *  
 *
 */
     public function handleProviderCallback(Request $request)
     {
         $provider = $request->get('provider');
         $oauth = Socialite::driver($request->get($provider))->redirect();

         if (!$request->has('code')) {
            // $user = $provider->user();
             // return $oauth->stateless()->user();
             return Socialite::driver($provider)->redirect();
         }
         else{
             return $oauth->scopes(['public_profile','user_friends'])->redirect();
         }
         if(!config('services'.$request->get($provider))){
            abort('404');
         }

         try{
             $providerUser = Socialite::driver($provider)->user();
             logger()->info(sprintf('provider:%s', $request->get($provider)));
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