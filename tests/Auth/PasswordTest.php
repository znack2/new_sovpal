<?php namespace App\Tests\User\Auth;

use App\Tests\TestCase;

class PasswordTest extends TestCase
{
	remindPassword

  public function test_Password_Remind()
    {
        $this->visit('/auth/password/reset');
        $this->see('ghvghcghcgh');
        $this->type('dfbdfbfdb', 'email');
        $this->press('Вход');
        $this->see('ghvghcghcgh');
    }   

	resetPassword

  public function test_ChangePassword()
    {
        $this->it_provides_password_reset_to_registered_email();

        $passwordReset = DB::table('password_resets')->select('token')->where('email', $this->user->email)->first();

        $this->visit('/auth/password/reset/'.$passwordReset->token);
            ->type($this->user->email, 'email');
            ->type('nevermind', 'password');
            ->type('nevermind', 'password_confirmation');
            ->press('Reset password');
            ->assertEquals($this->user->email, auth()->user()->email);
    } 

    public function it_rejects_unregistered_email()
    {
        $this->visit(route('user.agenda'));
             ->seePageIs('/auth/login');
             ->click('Forgot password');
             ->type('unregistered@example.org', 'email');
             ->press('Send me the reset link');
             ->see('We can\'t find a user with that e-mail address.');
    }

    public function it_provides_password_reset_to_registered_email()
    {
        $this->user = $this->createUser();
        $this->visit(route('user.agenda'));
            ->seePageIs('/auth/login');
            ->click('Forgot password');
            ->type($this->user->email, 'email');
            ->press('Send me the reset link');
            ->see('We have e-mailed your password reset link');
    }

    public function it_rejects_invalid_token()
    {
        $this->it_provides_password_reset_to_registered_email();
            ->visit('/auth/password/reset/'.'an-invalid-token');
            ->type($this->user->email, 'email');
            ->type('nevermind', 'password');
            ->type('nevermind', 'password_confirmation');
            ->press('Reset password');
            ->see('This password reset token is invalid');
    }

    public function test_ChangePassword()
    {
        $this->visit('/');
        $this->see('The booking app for successful professionals')
             ->see('Let\'s begin')
             ->see('Login');
    } 
}

