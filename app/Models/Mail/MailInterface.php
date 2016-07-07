<?php namespace Impl\Service\Notification;

interface NotifierInterface {

    public function to($to);

    public function from($from);

    public function notify($subject, $message);

}