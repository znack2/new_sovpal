<?php namespace App\Services\Mailer;

use App\Models\User\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Exceptions\MailerException;
use Config,Url;
use App\Services\Mailer\MailerInterface;

abstract class Mailer implements MailerInterface 
{
	private $mail;
    protected $from = 'admin@example.com';
    protected $email;
    protected $view;
    protected $data = [];
    protected $user;

    protected $locale = 'en_US.utf8';
    protected $localeSwitchFunction = 'setGlobalLocale';
    protected $revertLocale = 'en_US.utf8';
    protected $subjectKey = '';
    protected $subjectParams = [];
    protected $viewBase = 'emails';
    protected $viewPath = '';
    protected $subject = '';

	function __construct(Mailer $mail  = null)
	{
	    $this->mail = $mail;
        $this->user = auth()->user();
        $this->mail = $mail ?: new Mailer();
        $this->locale();
	}

    public function useFunction($functionName)
        {
            $this->localeSwitchFunction = $functionName;
            return $this;
        }
    public function locale($posixLocale = null)
        {
            $this->revertLocale = app()->getLocale();

            if ($posixLocale === null) {
                $posixLocale = $this->revertLocale;
            }
            $this->locale = $posixLocale;
            return $this;
        }
    public function template($template)
        {
            $this->viewPath = $template;
            return $this;
        }
    public function subject($key, $params = [])
        {
            $this->subjectKey = $key;
            $this->subjectParams = $params;
            return $this;
        }
    protected function switchLocale($posixLocale)
            {
                if (function_exists($this->localeSwitchFunction)) {
                    call_user_func($this->localeSwitchFunction, $posixLocale);

                    return $this;
                }
                return false;
            }
    protected function getViewKey()
        {
            $key = $this->viewBase.'.'.$this->locale.'.'.$this->viewPath;

            if (!view()->exists($key)) {
                throw new \Exception('Email view does not exist: '.$key);
            }
            return $key;
        }
    protected function getSubject()
        {
            return $this->subject = trans('emails.'.$this->subjectKey, $this->subjectParams);
        }


    public function send(array $header, array $params)
        {
            $this->switchLocale($this->locale);

            Mail::send($this->getViewKey(), $params, function ($mail) use ($header) {
                $mail->to($header['email'], $header['name'])
                     ->subject($this->getSubject());
            });


           // Mail::send('emails.contact', ['body' => $body], function ($message) use ($name,$emailToSendTo) {
           //     $message->from('unicodeveloper@hackathon-starter.com', "From: {$name}");
           //     $message->to($emailToSendTo)->subject("Message From Laravel Hackathon Starter Contact Form");
           // });

                       

            $this->switchLocale($this->revertLocale);
        }
    public function sendTo($user, $subject, $view, $data = [])
        {
        	//this->mail->send()
            //queueOn('queue-name', 'emails.welcome',
            if($this->mail->queue($view, $data, function($message) use($user, $subject)
            {
                $message->to($email)->subject($subject);
            }))

                // $this->mailer->send($this->view, $this->data, function ($message) {
                    
                //     $message->from($this->from, 'Administrator')
                //             ->to($this->to);
                // });

            {
                throw new MailerException;
            }
            return true;
        }
    public function sendEmailTo(User $user,$view = null,$data = null)
        {
            $this->email = $user->email;
            $this->view = isset($view) ? $view : 'emails.confirm';
            $this->data = isset($data) ? $data : compact('user');
            $this->sendTo();
        }

    public function sendContactUsMessage(User $user)
        {
            $subject = 'Welcome to Sovpal.ru!';
            $view = 'Layout.Emails.contact';

            return $this->sendTo($user, $subject, $view);
        }
}










        // Mail::send('emails.whitepaper', [], function ($m) {
        //     $m->to('barasa@wangusi.ke');
        //     $m->subject('Your whitepaper download');
        //     $m->attach(storage_path('pdfs/whitepaper.pdf'));
        // });