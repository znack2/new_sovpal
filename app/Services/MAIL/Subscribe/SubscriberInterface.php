<?php namespace App\Services\Mailer;

interface SubscriberInterface 
{
    public function subscribed();
    public function subscribeTo($listName, $email);
    public function unsubscribeFrom($list, $email);
    public function notify($title, $body);
} 