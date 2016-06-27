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
    
    public function __construct()
        {
            $this->middleware('guest');
        }
/**
 *
 *  Email form 
 *
 */
    public function getEmail()
        {
            $form  = [
                'title'  => 'Send Request for Reset Password',
                'model'  => 'auth',
                'method' => 'password',
                'button' => 'send password link',
                'type'   => 'panel',
            ];

             return view('pages._form',$form);
        }
/**
 *
 *  Reset form 
 *
 */
    public function getReset($token = null)
        {
            //display message you got new password
            //send to email password and login
            if (is_null($token)) {throw new NotFoundHttpException; }

            $form  = [
                'title'  => 'Reset Password',
                'model'  => 'auth',
                'method' => 'reset',
                'button' => 'reset',
                'type'   => 'panel',
                'tiken'  => $token
            ];

             return view('pages._form',$form);
        }
/**
 *
 *  Remind form 
 *
 */
    public function getRemind()
        {
            $form  = [
                'title'  => 'Remind Password',
                'model'  => 'auth',
                'method' => 'remind',
                'button' => 'remind',
                'type'   => 'panel',
            ];

            return view('pages._form',$form);
        }
/**
 *
 *  Password remind
 *
 */
    public function postRemind(PasswordRemindRequest $request)
        {
            try {
                $user = User::where('email', $request->get('email'))->first();
                $user->question === $request->get('question') && Hash::check($request->get('answer'), $user->answer);  
                $user->password = bcrypt($request->get('password'));
                $user->save();
                return redirect('auth/login')
                ->with(['success' => 'The password was changed']);     
            } catch (\Exception $e) {
                $message = sprintf("Error doing something %s", $e->getMessage());
                Log::debug($message);
                return redirect('auth/recover-password')
                    ->withInput($request->only('email', 'question'))
                    ->withErrors('The answer or the question doesn\'t match');
            }
        }
/**
 *
 *  Change password 
 *
 */
    public function changePassword(Request $request)
        {
            try {
                $this->validate($request, [
                    'password' => 'required|min:6|confirmed',
                ]);
                $user = User::where('email', $request->get('email'))->first();
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()
                    ->back()
                    ->with('info', 'Password successfully updated');    
            } catch (\Exception $e) {
                $message = sprintf("Error doing something %s", $e->getMessage());
                Log::debug($message);
                return redirect('auth/recover-password')
                    ->withInput($request->only('email', 'question'))
                    ->withErrors('The answer or the question doesn\'t match');
            }
        }
}
