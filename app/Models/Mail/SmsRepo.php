<?php namespace Impl\Service\Notification;

use Services_Twilio;

class SmsNotifier implements NotifierInterface {

    protected $to;

    protected $from;

    protected $twilio;

    public function __construct(Services_Twilio $twilio)
    {
        $this->twilio = $twilio;
    }

    public function to($to)
    {
        $this->to = $to;

        return $this;
    }

    public function from($from)
    {
        $this->from = $from;

        return $this;
    }

    public function notify($subject, $message)
    {
        $sms = $this->twilio
            ->account
            ->sms_messages
            ->create(
                $this->from,
                $this->to,
                $subject."\n".$message
            );
    }

}