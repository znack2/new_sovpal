<?php namespace App\Tests\User\Auth;

use App\Tests\Traits\CreateUser;
use app\Tests\Traits\SignUpUser;
use App\Tests\TestCase;

class LoginTest extends TestCase
{
    use CreateUser;
    use SignUpUser;

	public function setUp()
	{	
		$this->createUser();
	}

	login

    public function it_returns_home_page_if_user_is_authenticated()
    {
        // Auth::shouldReceive('check')->once()->andReturn(true);
        // $this->call('GET', 'home');
        // $this->assertResponseOk();
    }

        public function test_account_links_on_homepage_as_a_guest()
    {
        $this->visit('/')
            ->click(trans('user.login'))
            ->seePageIs('auth/login')
            ->see(trans('user.sign_in_your_account'))
            ->assertResponseOk();
        $this->visit('/')
            ->click(trans('user.register'))
            ->seePageIs('auth/register')
            ->see(trans('user.set_up_new_account'))
            ->assertResponseOk();
        $this->visit('wishes')
            ->see(trans('user.sign_in_your_account'))
            ->assertResponseOk();
        $this->visit('/')
            ->click(trans('user.your_wishlist'))
            ->see(trans('user.sign_in_your_account'))
            ->assertResponseOk();
    }

    public function a_user_may_register_for_an_account_but_must_confirm_their_email_address()
        {
            // When we register...
            $this->visit('register')
                 ->type('JohnDoe', 'name')
                 ->type('john@example.com', 'email')
                 ->type('password', 'password')
                 ->press('Register');
        
            // We should have an account - but one that is not yet confirmed/verified.
            $this->see('Please confirm your email address.')
                 ->seeInDatabase('users', ['name' => 'JohnDoe', 'verified' => 0]);
        
            $user = User::whereName('JohnDoe')->first();
        
            // You can't login until you confirm your email address.
            $this->login($user)
                 ->see('Could not sign you in.');
        
            // Like this...
            $this->visit("register/confirm/{$user->token}")
                 ->see('You are now confirmed. Please login.')
                 ->seeInDatabase('users', ['name' => 'JohnDoe', 'verified' => 1]);
        }


    public function it_requests_login_when_attempting_to_access_a_protected_page()
        {
            $this->visit(route('user.agenda'));
                ->seePageIs('/auth/login');
                ->see('Login');
                ->see('Password');
                ->see('Remember me');
        }
    

    public function a_user_may_login()
        {
            $this->login()
                 ->see('Lesson complete. Good job!')
                 ->onPage('dashboard');
        }


    public function it_provides_successful_login()
    {
        $user = $this->createUser(['email' => 'test@example.org', 'password' => bcrypt('password')]);

        $this->visit('auth/login');
             ->see('Login');
             ->see('Password');
             ->see('Remember me');
             ->type($user->email, 'email');
             ->type('password', 'password');
             ->press('Login');
             ->see('Well done! Please tell us what would you like to do');
    }

    public function it_redirects_back_to_form_if_login_fails()
    {
        // $credentials = [
        //     'email' => 'test@test.com',
        //     'password' => 'secret',
        // ];

        // Auth::shouldReceive('attempt')
        //      ->once()
        //      ->with($credentials)
        //      ->andReturn(false);

        // $this->call('POST', 'login', $credentials);

        // $this->assertRedirectedToAction(
        //     'AuthenticationController@login', 
        //     null, 
        //     ['flash_message']
        // );
    }

    public function it_denies_bad_login()
    {
        $user = $this->createUser(['email' => 'test@example.org', 'password' => bcrypt('password')]);
        
        $this->visit('auth/login');
            ->see('Login');
            ->see('Password');
            ->see('Remember me');
            ->type($user->email, 'email');
            ->type('BAD PASSWORD!', 'password');
            ->press('Login');
            ->see('These credentials do not match our records');
    }

    
//    public function it_fails_to_submit_an_invalid_token_post()
//    {
//        // Given I am a not authenticated user (guest)
//
//        // And I visit the homepage
//        $this->visit('/auth/login');
//
//        // And I fill the login form
//        $this->type('test@example.org', 'email')
//             ->type('password', 'password');
//
//        // And my session expired so as a token was invalidated
//        session()->regenerateToken();
//
//        // And I submit the form
//        $this->press('Login');
//
//        // Then I should see a message asking for resubmit
//        $this->see('please submit your form again');
//    }



	public function test_Login()
    {
    	//0

        $user = $user ?: $this->factory->create('App\User', ['password' => 'password']);
        
        return $this->visit('login')
                        ->type($user->email, 'email')
                        ->type('password', 'password') // You might want to change this.
                        ->press('Sign In');
        //1
                        
        $this->visit('/page/landing');
        //incorrect
        $this->type('ghvghcghcgh', 'email');
        $this->type('hvghcghcghc', 'password');
        $this->check('remember');
        $this->press('Вход');
        $this->see('ghvghcghcgh');
        //corect
        $this->type('ghvghcghcgh', 'email');
        $this->type('hvghcghcghc', 'password');
        $this->check('remember');
        $this->press('Вход');
        $this->seePageIs('/page/landing');
        $this->dontSee('Beta');

        //2

        $this->visit('/page/landing')
             ->see(trans('sovpal.forms.Register_title'))

             
         // EMPTY 
             ->seeElement("[name='email']")
             ->seeElement("[name='password']")
             ->seeElement("[name='remember']")
         ->press('Complete')
             ->see('name filed is required')
             ->see('email filed is required')
             ->see('password filed is required')


         // ERROR 
             ->seeElement("[name='email']")
             ->seeElement("[name='password']")
             ->check("[name='remember']")
         ->press('Complete')
             ->see('name must be a valid email address')
             ->see('email must be a valid email address')
             ->see('password must be a valid email address')


         // CORRECT
             ->seeElement("[name='email']")
             ->seeElement("[name='password']")
             ->check("[name='remember']")
         ->press('Complete')
            ->seePageIs('/')
            ->see('success');

        //3
            
        $this->visit('/');
        $this->click('Login');
        $this->see('Login')    // Form header
             ->see('Email')    // Login Form field
             ->see('Password') // Login Form field
             ->see('Github')   // oAuth button
             ->see('Facebook') // oAuth button
             ->see('Google');  // oAuth button

        //4

           $response = $this->call('GET', '/', ['name' => 'Taylor']);


        // 2)
        //->make() just create ->create() save it
        // $user = factory(User::class)->make();

        // 3)
        //check event is used but not really used
         // $this->expectsEvents(App\Events\UserRegistered::class);
         // $this->withoutEvents();

        // 4)
        // pretend use mock facade
        // Cache::shouldReceive('get')->once()->with('key')->andReturn('value');

        $this->assertTrue(true);
        // $this->seeInDatabase('users', ['email' => 'sally@example.com']);
    }    

    public function it_presents_the_register_page_through_login()
    {
        $this->visit('/auth/login');
        $this->click('Not registered yet');
        $this->see('We are going to build your profile') // Form header
             ->see('Your Email')      // Login Form field
             ->see('A password')      // Login Form field
             ->see('Repeat password') // Login Form field
             ->see('Register');       // Submit button
    }

    public function it_redirects_to_home_page_after_user_logs_in()
    {
        // $credentials = [
        //     'email' => 'test@test.com',
        //     'password' => 'secret',
        // ];

        // Auth::shouldReceive('attempt')
        //      ->once()
        //      ->with($credentials)
        //      ->andReturn(true);

        // $this->call('POST', 'login', $credentials);

        // $this->assertRedirectedTo('home');
    }

	logout

    public function it_provides_logout()
    {
        $user = $this->createUser();

        $this->actingAs($user);
            ->visit('auth/logout');
            ->seePageIs('/');
            ->see('Login');
    }
}

