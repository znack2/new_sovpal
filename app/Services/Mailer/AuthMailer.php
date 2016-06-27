<?php namespace App\Services\Mailer;

use App\Models\User\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Exceptions\MailerException;
use Config,Url;
use App\Services\Mailer\MailerInterface;

class AuthMailer extends Mailer 
{
	public function sendCompleteRegistrationMessage(User $user)
        {
            $subject = 'Welcome ' . $user->first_name;
            $view = 'Layout.Emails.welcome';
            $data = ['link' => URL::route('profile')];

            return $this->sendTo($user, $subject, $view, $data);
        }
	public function sendRemindPasswordMessage(User $user)
        {
            $subject = 'Welcome to Sovpal.ru!';
            $view = 'Layout.Emails.reminder';

            //        $subject = Config::get('Sentinel::config.reset_password');
            //        $data['userId'] = $userId;
            //        $data['resetCode'] = $resetCode;
            //        $data['email'] = $email;

            return $this->sendTo($user, $subject, $view);
        }
	public function sendNewPasswordMessage(User $user,$news_password,$code)
        {
            $subject = 'Reset Password';
            $view = 'Layout.Emails.password_reset';

            $data = [
                     'user'         => $user,
                     'new_password' => $news_password,
                     'link'         => URL::route('password_reset/', $code)
                     ];

            return $this->sendTo($user, $subject, $view, $data);
        }
    public function sendActivationMessage(User $user)
        {
            $subject = 'Welcome to Sovpal.ru!';
            $view = 'Layout.Emails.activate';

            return $this->sendTo($user, $subject, $view);
        }
    public function sendConfirmation(User $user, User $invitor = null)
        {
            if (!$user->email) {
                return;
            }

            $view = 'confirm';
            $subject = trans('texts.confirmation_subject');

            $data = [
                'user' => $user,
                'invitationMessage' => $invitor ? trans('texts.invitation_message', ['invitor' => $invitor->getDisplayName()]) : '',
            ];

            if ($invitor) {
                $fromEmail = $invitor->email;
                $fromName = $invitor->getDisplayName();
            } else {
                $fromEmail = CONTACT_EMAIL;
                $fromName = CONTACT_NAME;
            }

            $this->sendTo($user->email, $fromEmail, $fromName, $subject, $view, $data);
        }
    public function sendWelcomeMessage(User $user)
        {
            $data = ['code' => $user->activation_code,'name' => $user->username];
            $subject = 'Welcome'. $user->username;
            $view = 'Layout.Emails.welcome';
            //        $subject = Config::get('Sentinel::config.welcome');
            //        $data['userId'] = $userId;
            //        $data['activationCode'] = $activationCode;
            //        $data['email'] = $email;
            return $this->sendTo($user, $subject, $view, $data);
        }
}