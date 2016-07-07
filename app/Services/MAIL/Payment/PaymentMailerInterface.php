<?php namespace App\Services\Mail\Payment;

interface PaymentMailerInterface 
{
    public function send_Invoice($listName, $email);
    public function send_Payment_Confirmation($list, $email);
    public function send_License_Payment_Confirmation($title, $body);
    public function send_Notification($title, $body);
} 