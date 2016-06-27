<?php

class IndexTest extends TestCase
{

    public function test_Search_Users()
        {
            $this->visit('/page/landing');
            $this->type('dsgfdsgdsgdsg', 'street');
            $this->press('');
            $this->dontSee('Beta');
        }


    public function test_ifEmptyUsers()
        {
        }

        
    public function testIndexOwners()
    {
        $this->visit('/index/users');

        //checkbox
        $this->check('null');
        $this->visit('/index/users');
        $this->check('null');
        $this->visit('/index/users');
        $this->check('null');
        $this->visit('/index/users');
    }

    public function testIndexProfi()
    {
        $this->visit('/index/users');

        //checkbox
        $this->check('null');
        $this->visit('/index/users');

        //sidebar
        $this->press('3д визаулизация');
        $this->press('декор');
        $this->press('работа с документами');
        $this->press('рисунок');
        $this->press('арх надзор');
        $this->press('перепланировка');
        $this->press('закупки');
        $this->press('замер');
    }

    public function testIndexShops()
    {
        $this->visit('/index/users');
        //sidebar
        $this->press('Балкон');
        $this->press('Ванна');
        $this->press('Спальня');
        $this->press('Детская');
        $this->press('Прихожая');
        $this->press('Кухня');
        $this->press('Гостиная');
        $this->press('Кабинет');
        $this->press('Гардероб');

        //checkbox
        $this->check('null');
        $this->seePageIs('/index/users');
    }
}