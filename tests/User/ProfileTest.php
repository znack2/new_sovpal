<?php

class ProfileTest extends TestCase
{
     public function setUp()
    {   
        $this->createShop();
    }

    public function test_Create_Group()
    {
        $this->createItem();
        $this->createTags();
        $this->assertViewHas('foo', 'bar');
    }    

    //I am owner and I want to add item that other can order and give me money for it

    //unit
    //given - I am login (given factory or request) 
    //and - there is "my profile" (check method)
    //when - I go to "my items" 
    //and - I create new Item (check method)
    //then - I should be able to see it.(assert)

    //acceptance
    //given (url)
    //when (actions)
    //then (ui elements)

    show profile to other user

    show profile

         public function test_Profile()
    {
        $this->visit('/page/landing')
             ->see(trans('sovpal.forms.Register_title'))

             
         // EMPTY 
             ->seeElement("[name='email']")
             ->seeElement("[name='password']")
             ->seeElement("[name='remember']")
             ->attach($pathToFile, $elementName)
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
    }
    
    update avatar

    update page settings

    public function setUp()
    {   
        $this->createProfi();
    }

    show profile to other user

    show profile
    
    show page settings

    update page settings

    show list of users

}
