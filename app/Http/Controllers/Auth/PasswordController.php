<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Requests\Auth\PasswordRemindRequest;
use App\Models\User\User;
use Hash;

// NotFoundHttpException
class PasswordController extends Controller
{
    use ResetsPasswords;
/**
 *
 *  Email form for reset password
 *
 */
    public function getEmail()
        {
            $form  = [
                'title'  => 'Send Request for Reset or Remind Password',
                'model'  => 'auth',
                'method' => 'password',
                'button' => 'send password link',
                'type'   => 'panel',
            ];

             return view('pages._form',compact('form'));
        }
/**
 *
 *  Reset password form 
 *
 */
    public function getReset($token = null)
        {
            if (is_null($token)) {
                throw new NotFoundHttpException;
            }

            $form  = [
                'title'  => 'Reset Password',
                'model'  => 'auth',
                'method' => 'reset',
                'button' => 'reset',
                'type'   => 'panel',
                'token'  => $token
            ];

             return view('pages._form',compact('form'));
        }
}
