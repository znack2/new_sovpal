<?php namespace App\Tests\Traits;

use App\Models\User\User;

trait SignUpUser
{
  protected $user;

  //activate user
  //check banned
  //update last_login

	public function SignUp()
  	{
      $user = $this->user;
      $this->signUp($user);
  	}
}