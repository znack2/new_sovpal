<?php namespace App\Tests\Group;

use App\Tests\Traits\UiTest;
use App\Tests\Traits\SignUp;
use App\Tests\TestCase;

class AbstractIndexTest extends TestCase
{
    use UiTest;

    $rooms = ['Балкон','Ванна','Спальня','Детская','Прихожая','Кухня','Гостиная','Кабинет','Гардероб'];
    $skills = ['3д визулизация', 'декор', 'работа с документами', 'рисунок', 'арх надзор', 'перепланировка', 'закупки', 'замер'];
    $tags = [ 'столярные', 'декор', 'демонтажные', 'электрика', 'кованные', 'монтажные', 'другие', 'лакокрасочные', 'Паркетная доска', 'сантехнические', 'Керамическая плитка'];
    $types = ['электрика', 'ручные', 'измерительные', 'универсальные'];
    $elements = [];

    public function test_visit_as_Owner($page = )
    {
        $this->visit_as_User_type('Owner',$page)
             ->seeIndexUI()
             ->check("[name='remember']")
             ->press('Complete')
             ->seePageIs('/')
             ->see_success_Flash('success');
    }

    public function test_visit_as_Profi($page = )
    {
        $this->visit_as_User_type('Profi',$page);
        $this->seeIndexUI();
    }

    public function test_visit_as_Shop($page = )
    {
        $this->visit_as_User_type('Shop',$page);
        $this->seeIndexUI();
    }

    public function seeIndexUI()
        {
          $this->seeHeader();
          $this->seeProfile_Dropdown();

          $this->seeMenu('index');
        
          $this->seeSidebar('index');
          $this->seePagination();
          $this->seeList();

          $this->seeBlog('index');
          $this->seeFooter();
        }  
}
