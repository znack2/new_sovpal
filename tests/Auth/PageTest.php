<?php namespace App\Tests\User\Auth;

use App\Tests\TestCase;

class PageTest extends TestCase
{
    // page blog ?

        contactUs


        $this->see('КОНТАКТНАЯ ИНФОРМАЦИЯ');
        $this->click('Contacts');
        $this->seePageIs('/page/contacts');
        $this->see('Мы всегда на связи');
        $this->type('sdsgsdg', 'name');
        $this->type('sdgsdgsdg', 'email');
        $this->type('dsgsdgsdgsdg', 'message');
        $this->press('Отправить');
        $this->seePageIs('/page/contacts');
        $this->visit('/page/landing');

    landing + check who lives near to you

    public function test_Landing()
    {
        $this->visit('/page/landing');
                        $this->visit('/')
            ->see('Antvel eCommerce')
            ->assertResponseOk();
        $this->assertEquals($this->visit('/'), $this->visit('home') );
    }   

    public function test_about_page()
    {
        $this->visit('/')
            ->click(trans('company.about_us'))
            ->seePageIs('about')
            ->see(trans('company.about_us'))
            ->assertResponseOk();

        $this->see('ВХОД');
            $this->click('About Us');
            $this->seePageIs('/about-us');
            $this->see('ВХОД');
            $this->visit('/page/landing');
    }

    public function test_faq_page()
    {
        $this->see('ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ');
            $this->click('About Us');
            $this->seePageIs('/about-us');
            $this->see('Мы всегда на связи');
            $this->visit('/page/landing');
    }
    
    public function howitworks()
    {

    }

    public function it_shows_premium()
    {
        $this->actingAs($user);
             ->visit(route('wizard.pricing'));
             ->see('Ideal for freelancers');
    }

    public function it_shows_the_terms_and_conditions()
    {
        $this->actingAs($user);
            ->visit(route('wizard.terms'));
            ->see('TERMS AND CONDITIONS');


        $this->see('ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ');
            $this->click('About Us');
            $this->seePageIs('/about-us');
            $this->see('ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ');
            $this->visit('/page/landing');

        $this->visit('/')
            ->click(trans('company.terms_of_service'))
            ->seePageIs('terms')
            ->see(trans('company.terms_of_service'))
            ->assertResponseOk();
    }

    public function test_privacy_page()
    {
            $this->see('БЕЗОПАСНОСТЬ');
            $this->click('About Us');
            $this->seePageIs('/about-us');
            $this->see('БЕЗОПАСНОСТЬ');
            $this->visit('/page/landing');

        $this->visit('/')
            ->click(trans('company.privacy_policy'))
            ->seePageIs('privacy')
            ->see(trans('company.privacy_policy'))
            ->assertResponseOk();
    }

    public function owner()
    {
        $this->see('ВЛАДЕЛЬЦАМ');
            $this->click('About Us');
            $this->seePageIs('/page/owners');
            $this->see('Отличный способ сэкономить.');
            $this->visit('/page/landing');
    }
    
    public function profi()
    {
        $this->see('ДИЗАЙНЕРАМ');
            $this->click('About Us');
            $this->seePageIs('/page/designers');
            $this->see('Отличный способ рассказать о своих товарах.');
            $this->visit('/page/landing');
    }
    
    public function shop()
    {
        $this->see('МАГАЗИНАМ');
            $this->click('About Us');
            $this->seePageIs('/page/shops');
            $this->see('Отличный способ рассказать о своих товарах.');
            $this->visit('/page/landing');
    }

    public function test_404ErrorPage()
    {
        $response = $this->call('GET', '/language/123');
        $this->assertEquals(404, $response->status());
    }    
}

