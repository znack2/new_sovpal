<?php namespace App\Tests\User\Auth;

use App\Tests\Traits\CreateUser;
use App\Tests\TestCase;

class RegisterTest extends TestCase
{
    use CreateUser;

	public function setUp()
	{	
		$this->createUser();
	}


// 1)home route - check login user 
// 2)If not redirect to login with flash.
// 3)After login redirect back home page.
// 4)If login fails redirect back to login with flash.


    public function it_redirects_to_login_if_user_is_not_authenticated()
    {
        // Auth::shouldReceive('check')->once()->andReturn(false);

        // $response = $this->call('GET', 'home');

        // // Check that you're redirecting to a specific controller action with a flash message
        // $this->assertRedirectedToAction('AuthenticationController@login', null, ['flash_message'] );

        // // Only check that you're redirecting to a specific URI
        // $this->assertRedirectedTo('login');

        // // Just check that you don't get a 200 OK response.
        // $this->assertFalse($response->isOk());

        //ok
        // $this->assertTrue($response->isOk());

        // // Make sure you've been redirected.
        // $this->assertTrue($response->isRedirection());

        $this->assertEquals('302', $response->foundation->getStatusCode());
        $session_errors = \Laravel\Session::instance()->get('errors')->all();
        $this->assertNotEmpty($session_errors);
        $this->assertNull($session_errors);

        View::shouldReceive('make')->with('login');  
    }

    public function test_empty_Register()
    {
         ->press('Complete')
             ->see('name filed is required')
             ->see('email filed is required')
             ->see('password filed is required')
    }     

    public function test_error_Register()
    {
        $this->actingAs($this->user)
             ->withSession(['foo' => 'bar'])
             ->visit('auth/register')
         ->see_Registration_Form_Fields()
             ->select($value, $elementName)
             ->type('owner', 'user_type');
             ->type('profi', 'user_type');
             ->type('shop', 'user_type');
             ->type($user->first_name, 'first_name')
             ->type($user->last_name, 'last_name')
             ->type($user->email, 'email')
             ->type('test@timegrid.io', '#email')
             ->type('password', 'password')
             ->type('password', 'password_confirmation')
             ->type('anton','street')
             ->type('anton','house')
             ->type('anton','corpus')
             ->check('terms')
         ->press('Complete')
             ->see('name must be a valid name address')
             ->see('email must be a valid email address')
             ->see('Please confirm your password correctly');
             ->see('The password field is required.');
             ->dontSee('Beta');
    }     

    public function test_success_Register($type = null)
    {
        $this->visit('auth/register')
         ->see_Registration_Form_Fields()
             ->select('', '')
             ->type($type, 'user_type');
             ->type('', 'first_name')
             ->type('', 'last_name')
             ->type(''l, 'email')
             ->type('test@timegrid.io', '#email')
             ->type('password', 'password')
             ->type('password', 'password_confirmation')
             ->type('anton','street')
             ->type('anton','house')
             ->type('anton','corpus')
             ->check('terms')
        ->press('Complete')
             ->seePageIs('/')
             ->see('Well done ' .$this->user->first_name .'! Please tell us what would you like to do');
    }         

    public function test_success_Register_as_owner()
    {
        $this->test_success_Register('owner');
    }     

    public function test_success_Register_as_shop()
    {
         $this->test_success_Register('shop')
    }     

    public function test_success_Register_as_profi()
    {
         $this->test_success_Register('profi')
    }     

    protected function see_Registration_Form_Fields()
    {
         // ->see(trans('sovpal.forms.Register_title'))

        $this->see('РЕГИСТРАЦИЯ');
            $this->click('About Us');
            $this->seePageIs('/about-us');
            $this->see('РЕГИСТРАЦИЯ');
            $this->visit('/page/landing');
            
        $this->see('Hi! We are going to build your profile')
             ->see('Your Email')
             ->see('A password')
             ->see('Repeat password')
             ->seeElement("[name='owner']")
             ->seeElement("[name='profi']")
             ->seeElement("[name='shop']")
             ->seeElement("[name='first_name']")
             ->seeElement("[name='last_name']")
             ->seeElement("[name='street']")
             ->seeElement("[name='house']")
             ->seeElement("[name='corpus']")
             ->seeElement("[name='email']")
             ->seeElement("[name='password']")
             ->seeElement("[name='password_confirmation']")
             ->seeElement("[name='terms']")
             ->see('Register');

    }
}
