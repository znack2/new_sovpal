<?php namespace App\Services\Mailer;

interface AuthMailerInterface 
{
    public function send_Activation($user);
    public function send_Complete_Regitration($user);
    public function send_Remind_Password($user);
    public function send_Reset_Password($user,$password,$code);
} 