<?php namespace App\Tests\Index\Owner;

class UserIndexTest extends AbstractIndexTest
{
    public function setUp()
    {   
        $this->test_visit_as_Owner();
    }
//======== INDEX =======

    public function test_Index_Owners()
        {
            $this->visit('/index/users');

        }    
    public function test_index_Profis()
        {
            $this->visit('/index/users');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->skills as $room){
                $this->see($room);
            }
        }    
    public function test_index_Shops()
        {
            $this->visit('/index/users');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->skills as $room){
                $this->see($room);
            }
        }

//======== FILTER =======

    public function test_filter_by_type_tag()
        {
            $this->test_Index_Item_Owners();

            foreach($this->rooms as $room){
                $this->see($room);
            }
            
            $this->dontSee('Beta');
        }

    public function test_filter_by_type_tag()
        {
            $this->test_Index_Item_Owners();

            foreach($this->rooms as $room){
                $this->see($room);
            }
            
            $this->dontSee('Beta');
        }

    public function test_filter_by_Premium()
        {
            $this->test_Index_Item_Owners();
        }

//======== SEARCH =======

    public function test_Search_Items($keyword = null)
        {
            $this->test_Index_Item_Owners();

            $this->type($keyword, 'keyword');
            $this->press('search');
        }

//======== SORT =======

            
    public function test_sort_by_Price()
        {
            $this->test_Index_Item_Owners();
            $this->press('price');
        }

    public function test_sort_by_Popular()
        {
            $this->test_Index_Item_Owners();
            $this->press('popular');
        }

    public function test_sort_by_Recent()
        {
            $this->test_Index_Item_Owners();
            $this->press('date');
        }
}