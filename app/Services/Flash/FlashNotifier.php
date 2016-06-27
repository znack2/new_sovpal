<?php namespace App\Services\Flash;

use App\Services\SessionStore;

class FlashNotifier
{
    private $session;

    function __construct(SessionStore $session)
        {
            $this->session = $session;
        }

    public function overlay($message, $title = 'Notice')
            {
                $this->message($message);

                $this->session->flash('flash.overlay', true);
                $this->session->flash('flash.title', $title);

                return $this;
            }
    public function message($message, $style = 'info')
            {
                $this->session->flash('flash.message', $message);
                $this->session->flash('flash.style', $style);

                return $this;
            }
    public function important()
        {
            $this->session->flash('flash.important', true);

            return $this;
        }
    public function steps($message)
      {
            $this->session->flash('flash.message',$message);
            return $this;
        }

//type of message

    public function info($message)
           {
               $this->message($message, 'info');

               return $this;
           }
    public function success($message)
           {
               $this->message($message, 'success');

               return $this;
           }
    public function error($message)
           {
               $this->message($message, 'danger');

               $this;
           }
    public function warning($message)
       {
           $this->message($message, 'warning');

           return $this;
       }


}


// public function dialog($message,$title,$icon,$style='default'){
//     $this->session->flash('flash.dialog',$message);
//     $this->session->flash('flash.title',$title);
//     $this->session->flash('flash.icon',$icon);
//     $this->session->flash('flash.style',$style);
// }

// public function next/confirm/more/overlay($message,$title){return        
//     $this->dialog($message,$title,'','info/success/danger/primary');
// }

// public static function success/error($message, $time = 5000, $close = false) 
// {static::add('success/error', $message, $time); }

// public static $notifications = [];
// public static function show()
//     {
//         $notifications = Session::get('notifications');
//         if(count($notifications) > 0)
//         {
//             echo '<div class="alert-messages">';
//             foreach($notifications as $notification) {
//                 echo '<div class="alert alert-'.$notification['type'].'">';
//                 if(isset($notification['close']) && $notification['close'] == true) echo '<a class="close">×</a>';
//                 echo $notification['message'];
//                 echo '</div>';
//             }
//             echo '</div>';
//         }
//     }
// protected static function add($type, $message, $time)
//     {
//         static::$notifications = [
//             'type' => $type,
//             'message' => $message,
//             'time' => $time
//         ];
//         Session::flash('notifications', static::$notifications);
//     }

//   ->items(['Laravel', 'PHP','rggntntn'])
//   ->button('Renew now!', url('renew'), 'primary');

//    public function button($text, $url, $class = 'default')
    //    {
    //        $this->session->flash('flash.button',[
    //            'text' => $text,
    //            'url' => $url,
    //            'class' => $class,
    //        ]);
    //    }
//    public function items($items)
    //    {
    //        $items = !is_array($items) ? $items->all() : $items;
    //        $this->session->flash('flash.items',[$items]);
    //    }