<?php namespace App\Tests\Admin;

use App\Tests\Traits\CreateGroup;

class DashboardTest extends TestCase
{
    use CreateGroup;

    $rooms = ['Балкон','Ванна','Спальня','Детская','Прихожая','Кухня','Гостиная','Кабинет','Гардероб'];
    $types = ['3д визулизация', 'декор', 'работа с документами', 'рисунок', 'арх надзор', 'перепланировка', 'закупки', 'замер'];

    public function setUp()
    {   
        $this->createGroup();
        $this->createTags();
    }

    //======== INDEX =======


    public function test_Index_Tags()
        {
            $this->visit('/index/groups?type=items');
            $this->dontSee('Welcome');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->types as $type){
                $this->see($type);
            }
        }  

    public function test_Index_News()
        {
            $this->visit('/index/groups?type=items');
            $this->dontSee('Welcome');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->types as $type){
                $this->see($type);
            }
        }    

    public function test_index_Users()
        {
            $this->visit('/index/groups?type=users');
            $this->dontSee('Welcome');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->types as $type){
                $this->see($type);
            }
        }   

    public function test_index_Hire()
        {
            $this->visit('/index/groups?type=users');
            $this->dontSee('Welcome');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->types as $type){
                $this->see($type);
            }
        }    
        
    public function test_index_Rent()
        {
            $this->visit('/index/groups?type=users');
            $this->dontSee('Welcome');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->types as $type){
                $this->see($type);
            }
        }    

    public function test_index_Purchase()
        {
            $this->visit('/index/groups?type=users');
            $this->dontSee('Welcome');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->types as $type){
                $this->see($type);
            }
        }    

    public function test_index_Items()
        {
            $this->visit('/index/groups?type=users');
            $this->dontSee('Welcome');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->types as $type){
                $this->see($type);
            }
        }    

    public function test_index_Groups()
        {
            $this->visit('/index/groups?type=users');
            $this->dontSee('Welcome');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->types as $type){
                $this->see($type);
            }
        } 

    public function test_index_Rooms()
        {
            $this->visit('/index/groups?type=users');
            $this->dontSee('Welcome');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->types as $type){
                $this->see($type);
            }
        }    

    //======== FILTER =======

    public function test_filter_by_type_tag()
        {
            $this->test_Index_Item_Groups();
            $this->dontSee('Welcome');

            foreach($this->rooms as $room){
                $this->see($room);
            }
        }

    public function test_filter_by_type_tag()
        {
            $this->test_Index_Item_Groups();
            
            foreach($this->types as $type){
                $this->see($type);
            }
        }

    public function test_filter_by_Premium()
        {

        }

    public function test_filter_by_Expired()
        {

        }

//======== SEARCH =======

    public function test_Search_Group($keyword = null)
        {
            $this->test_Index_Item_Groups();

            $this->type($keyword, 'keyword');
            $this->press('search');
        }

//======== SORT =======

    public function test_sort_by_Price()
        {
            $this->test_Index_Item_Groups();
            $this->press('price');
        }

    public function test_sort_by_Recent()
        {
            $this->test_Index_Item_Groups();
            $this->press('date');
        }

    public function test_sort_by_Popular()
        {
            $this->test_Index_Item_Groups();
            $this->press('view');
        }
}


