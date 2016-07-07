<?php namespace App\Tests\Index\Owner;

class ItemIndexTest extends AbstractIndexTest
{
    public function setUp()
    {   
        $this->test_visit_as_Owner();
    }
//======== INDEX =======

    public function test_Index_Items()
        {
            $this->visit_as_Owner();
            

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->skills as $skill){
                $this->see($skill);
            }            
            foreach($this->tags as $tag){
                $this->see($tag);
            }
        }    
    public function test_index_Materials()
        {
            $this->visit('/index/items?type=materials');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->skills as $skill){
                $this->see($skill);
            }            
            foreach($this->tags as $tag){
                $this->see($tag);
            }
        }    
    public function test_index_Tools()
        {
            $this->visit('/index/items?type=tools');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->skills as $skill){
                $this->see($skill);
            }            
            foreach($this->tags as $tag){
                $this->see($tag);
            }
        }

//======== FILTER =======

    public function test_filter_by_room_tag()
        {
            $this->test_Index_Item_Items();
        }

    public function test_filter_by_type_tag()
        {
            $this->test_Index_Item_Items();
        }

    public function test_filter_by_type_tag()
        {
            $this->test_Index_Item_Items();
        }


//======== LIMIT =======
        
    public function test_filter_by_Premium()
        {
            $this->test_Index_Item_Items();
        }    

    public function test_filter_by_Close_Address()
        {
            $this->test_Index_Item_Items();
        }   

    public function test_filter_by_With_Designer()
        {
            $this->test_Index_Item_Items();
        }   

    public function test_filter_by_Own_Remont()
        {
            $this->test_Index_Item_Items();
        }

//======== SEARCH =======

    public function test_Search_Items($keyword = null)
        {
            $this->test_Index_Item_Items();

            $this->type($keyword, 'keyword');
            $this->press('search');
        }

//======== SORT =======

            
    public function test_sort_by_Price()
        {
            $this->test_Index_Item_Items();

            $this->press('price');
        }

    public function test_sort_by_Popular()
        {
            $this->test_Index_Item_Items();

            $this->press('view');
        }

    public function test_sort_by_Recent()
        {
            $this->test_Index_Item_Items();

            $this->press('date');
        }
}
