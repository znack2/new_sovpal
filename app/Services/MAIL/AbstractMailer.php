<?php namespace App\Services\Mailer;

use App\Models\User\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Exceptions\MailerException;
use Config;
use Url;

abstract class Mailer
{
    protected $from = 'info@sovpal.ru';
    protected $data = [];
    
    protected $email;
    protected $user;

    protected $locale = 'en_US.utf8';
    protected $localeSwitchFunction = 'setGlobalLocale';
    protected $revertLocale = 'en_US.utf8';

    protected $view;
    protected $viewBase = 'emails';
    protected $viewPath = '';

    protected $subject;
    protected $subjectKey = '';
    protected $subjectParams = [];

	function __construct(Mailer $mail  = null)
    	{
            $this->user = \Auth::user();
            $this->mail = $mail ?: new Mailer();
            // $this->mail = app()->make('Illuminate\Contracts\Mail\Mailer');
            $this->locale();
            $this->data = $this->getData();
            $this->setLogoPath();
    	}

    public function useFunction($functionName)
        {
            $this->localeSwitchFunction = $functionName;
            return $this;
        }

    public function setLocale($posixLocale = null)
        {
            $this->revertLocale = app()->getLocale();

            if ($posixLocale === null) {
                $posixLocale = $this->revertLocale;
            }
            $this->locale = $posixLocale;
            return $this;
        }
    public function setTemplate($template)
        {
            $this->viewPath = $template;
            return $this;
        }
    public function setSubject($key, $params = [])
        {
            $this->subjectKey = $key;
            $this->subjectParams = $params;
            return $this;
        }
    public function setLogoPath()
        {
            $this->data['logo']['path'] = str_replace(
                '%PUBLIC%',
                Request::getSchemeAndHttpHost(),
                $this->data['logo']['path']
            );
        }

    public function sendTo(array $user, array $data)
        {
            $data    = isset($data) ? $data : compact('user');
            $view    = $this->getMailView() ?: 'emails.confirm';
            $subject = $this->getSubject();
            $from    = $this->from;
            $attach  = storage_path($data['file_path']);

            $this->switchLocale($this->locale);

            app()->make(Snowfire\Beautymail\Beautymail::class)->send($view, [], function($message)
            {

            });

            if($this->mail->queue/queueOn($view, $data, function ($mail) use ($name, $from, $user, $subject) {
                $mail->from($from, "From: {$name}");
                     ->to($user['email'], $user['name'])
                     ->subject($subject)
                     ->attach($attach);
            })

                // $this->mail->sendTo('emails.new', $request, function ($message_) use ($this->currentUser) {
                //     $message_->to(AppSettings::get('email_support')->value_, 'Сайт МНВК')->subject('Новое письмо!');
                // });    

            $this->switchLocale($this->revertLocale);
            ){
                throw new MailerException();
            }
            return true;
        }

    protected function switchLocale($posixLocale)
        {
            if (function_exists($this->localeSwitchFunction)) {
                call_user_func($this->localeSwitchFunction, $posixLocale);
                return $this;
            }
            return false;
        }     
    protected function getMailView()
        {
            $key = $this->viewBase.'.'.$this->locale.'.'.$this->viewPath;

            if (!view()->exists($key)) {
                throw new MailException('Email view does not exist: '.$key);
            }
            return $key;
        }
    protected function getSubject()
        {
            return $this->subject = trans('emails.'.$this->subjectKey, $this->subjectParams);
        }
    protected function getData()
        {
            return [
                'css' => [
                    '.button-content .button { background: red }',
                ],
                'colors' => [
                    'highlight' => '#004ca3',
                    'button'    => '#004cad',
                ],
                'view' => [
                    'senderName'  => null,
                    'reminder'    => null,
                    'unsubscribe' => null,
                    'address'     => null,
                    'logo'        => [
                        'path'   => '%PUBLIC%/images/logo.png',
                        'width'  => '25',
                        'height' => '25',
                    ],
                    'twitter'  => null,
                    'facebook' => null,
                    'flickr'   => null,
                ],
            ];
        }
    protected function getfailures()
        {
            return $this->mailer->failures();
        }
}










