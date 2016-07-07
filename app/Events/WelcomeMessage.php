<?php namespace App\Listeners;

use App\Events\ItemEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Nahidz\Notify\Notify;
use Illuminate\Support\Facades\Mail;

use Auth;
use App\Models\user\User;

class WelcomeMessage implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public $comment;
    public $message;


    use InteractsWithQueue;

    public function handle()
    {
 
    }
}