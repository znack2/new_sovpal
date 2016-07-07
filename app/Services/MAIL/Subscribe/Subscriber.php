<?php namespace App\Services\Mailer;

use Mailchimp;
use App\Services\Mailer\SubscriberInterface;

class Mailer extends AbstractMailer implements SubscriberInterface {

    const LESSON_SUBSCRIBERS_ID = '56d7c348b1';
    protected $lists = ['lessonSubscribers' => '56d7c348b1'];
    protected $mailchimp;

    public function __construct(Mailchimp $mailchimp)
        {
            $this->mailchimp = $mailchimp;
        }

    public function subscribed()
        {
            $subject    = 'Welcome to the site!';
            $view       = 'emails.user.subscribed';
            $data       = ['enter view data here'];
            $this->emailTo($this->user, $view, $data, $subject);
        }
        
    public function upgraded()
        {
            $subject    = 'Membership upgraded!';
            $view       = 'emails.user.upgraded';
            $data       = ['enter view data here'];
            $this->emailTo($this->user, $view, $data, $subject);
        }
    public function notify(Request $request){
            // $listId = env('MAILCHIMP_LIST_ID');
            // $mailchimp = new \Mailchimp(env('MAILCHIMP_KEY'));

            // $campaign = $mailchimp->campaigns->create('regular', [
            //     'list_id' => $listId,
            //     'subject' => 'New Article from Scotch',
            //     'from_email' => 'pub@gmail.com',
            //     'from_name' => 'Scotch Pub',
            //     'to_name' => 'Scotch Subscriber'

            // ], [
            //     'html' => $request->input('content'),
            //     'text' => strip_tags($request->input('content'))
            // ]);

            // $mailchimp->campaigns->send($campaign['id']);
            // return response()->json(['status' => 'Success']);
        } 
    public function subscribe($events)
                {
                    $events->listen('user.registered',   'Acme\Mailers\UserMailer@welcome');
                    $events->listen('user.resend',       'Acme\Mailers\UserMailer@welcome');
                    $events->listen('user.forgot',      'Acme\Mailers\UserMailer@forgotPassword');
                    $events->listen('user.newpassword', 'Acme\Mailers\UserMailer@newPassword');
                }
    public function notify($title, $body)
        {
            $options = [
                'list_id'    => self::LESSON_SUBSCRIBERS_ID,
                'subject'    => 'New on Laracasts: ' . $title,
                'from_name'  => 'Laracasts',
                'from_email' => 'jeffrey@laracasts.com',
                'to_name'    => 'Laracasts Subscriber'
            ];

            $content = [
                'html' => $body,
                'text' => strip_tags($body)
            ];

            $campaign = $this->mailchimp->campaigns->create('regular', $options, $content);

            $this->mailchimp->campaigns->send($campaign['id']);
        }
    public function subscribeTo($listName, $email)
        {
            return $this->mailchimp->lists->subscribe(
                $this->lists[$listName],
                ['email' => $email],
                null, // merge vars
                'html', // email type
                false, // require double opt in?
                true // update existing customers?
            );
        }
        
        public function sendSubscribeMessage($name,$email)
                {
                    $data = [
                        'info'=>'Hello my friend you soon will be at first premium users who will be able to experience new service! Enjoy!',
                        'name'  => $name
                    ];


                    $user['email']=$email;
                    $user['first_name']=$name;

                    $subject = 'Welcome to Sovpal.ru!';
                    $view = 'Landing.welcome';

                    return $this->sendTo($user, $subject, $view, $data);
                }
    public function unsubscribeFrom($listName, $email)
        {
            return $this->mailchimp->lists->unsubscribe(
                $this->lists[$listName],
                ['email' => $email],
                false, // delete the member permanently
                false, // send goodbye email?
                false // send unsubscribe notification email?
            );
        }
}