<?php namespace App\Tests\Index\Owner;

class GroupIndexTest extends AbstractIndexTest
{
    public function setUp()
    {   
        
    }
//======== INDEX =======

    public function test_Index_Item_Groups()
        {
            $this->test_visit_as_Owner('/index/groups?type=items');

            foreach($this->rooms as $room){
                $this->see($room);
            }
            foreach($this->types as $type){
                $this->see($type);
            }
        }    

    public function test_index_User_Groups()
        {
            $this->test_visit_as_Owner('/index/groups?type=users');

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

//======== LIMIT =======

    public function test_limit_by_Premium()
        {
            $this->test_Index_Item_Groups();

            $this->check('premium');
            


            $premium_group = $this->user->groups()->create(['premium'=>'true']);
            $groups = Group::getPremium();
            $this->assertEquals($premium_group->id, $groups->first()->id);
        }

    public function test_limit_by_Today_Expired()
        {
            //add extra item with params
            $expired_item = factory(item::class)->create(['expires'=>Carbon\Carbon::now()]);
            $expired_group = $this->user->groups()->create(['expires'=>Carbon\Carbon::now()]);
            $groups = Group::getExpired();//->get() inside
            $this->assertEquals($expired_group->id, $groups->first()->id);
            $this->setExpectedException('Exception');
        }

    public function test_limit_by_Soon_Expired()
        {

        }

    public function test_limit_by_No_Expired()
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