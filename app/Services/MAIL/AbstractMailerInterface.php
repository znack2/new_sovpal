<?php namespace App\Services\Mailer;

interface AbstractMailerInterface 
{
	  public function useFunction();
	  public function setLocale();
	  public function setTemplate();
	  public function setSubject();
	  public function sendTo();
} 