 public function switch_to_english()
    {

        $this->visit('/page/landing');
        $this->see('En');
        $this->press('En');
        $this->seePageIs('/page/landing');
        $this->see('Ru');
        $this->press('Ru');
        $this->seePageIs('/page/landing');
        $this->see('En');


        $applocale = 'en_US.utf8';
        $this->call('GET', "/lang/$applocale");

        $this->assertSessionHas('language', 'en');
        $this->assertSessionHas('applocale', $applocale);
        $this->assertResponseStatus(302);
    }

    public function switch_to_russian()
    {
        $applocale = 'es_ES.utf8';
        $this->call('GET', "/lang/$applocale");

        $this->assertSessionHas('language', 'es');
        $this->assertSessionHas('applocale', $applocale);
        $this->assertResponseStatus(302);
    }

    /*
     * TODO: For some reason the custom header is not working, thus the test not
     * feasible by now.
     */

    
//    public function it_attempts_to_use_agent_preferred_languages_first_spanish()
//    {
//        $this->get('/', [
//            'HTTP_ACCEPT_LANGUAGE'  => 'es-ES,es;q=0.8,en-US;q=0.6,en;q=0.4',
//        ]);
//
//        $this->see('La agenda de citas para profesionales exitosos');
//    }

  public function testRussian()
    {   
        $this->visit('/language/ru')
             ->see('Contato')
             ->dontSee('Connexion')
             ->dontSee('Connection');
    }
    

    public function testEnglish()
    {
        $this->visit('/language/foo')
             ->see('Connection')
             ->dontSee('404');
    }

    protected function setLanguageAndGoToRegister()
    {
        return $this->visit('/lang/en_US.utf8')
                    ->visit('/auth/register');
    }