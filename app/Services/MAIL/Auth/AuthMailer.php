<?php namespace App\Services\Mailer;

use App\Models\User\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Exceptions\MailerException;
use Config,Url;
use App\Services\Mailer\MailerInterface;

class AuthMailer extends AbstractMailer implement PaymentMailerInterface
{
    public function send_Activation($user, $invitor = null)
        {
            if (!$user->email) { return; } 

            $subject = 'Complete your registration';
            $view = 'Emails.activate';
            $data = ['code' => $user->activation_code,
                     'name' => $user->username];

            $data .= $invitor ? ['invitor_message' => $invitor['invitation_message'],'invitor' => $invitor->first_name] : '';

            return $this->sendTo($user, $subject, $view, $data);
        }

	public function send_Complete_Registration($user)
        {
            $subject = 'Welcome to Sovpal.ru!'. $user->first_name;
            $view    = 'Emails.welcome';
            $data    = ['name' => $user->username,'link' => route('profile')];

            return $this->sendTo($user, $subject, $view, $data);
        }
	public function send_Remind_Password($user)
        {
            $subject = 'Welcome to Sovpal.ru!';
            $view    = 'Emails.reminder';
            $data    = ['name' => $user->username,'link' => route('profile')];

            return $this->sendTo($user, $subject, $view, $data);
        }
	public function send_Reset_Password($user,$password,$code)
        {
            $subject = 'Reset Password';
            $view    = 'Emails.password_reset';
            $data = ['user'=> $user,'new_password' => $password,'link'=> route('password/reset/', $code)];

            return $this->sendTo($user, $subject, $view, $data);
        }
}