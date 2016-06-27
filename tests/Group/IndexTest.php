<?php

class IndexTest extends TestCase
{

    public function test_SearchGroups()
        {
        }

    public function test_ifEmptyGroups()
        {
        }


            //check sort "getPopular" method
    public function test_it_Repository_method_getPopular()
        {
            $expired_group = factory(Group::class)->create(['expires'=>Carbon\Carbon::now()]);
        }

    //check sort "getRecent" method
    public function test_it_Repository_method_getRecent()
        {

        }
        
    //check sort "getCompleted" method
    public function test_it_Repository_method_getCompleted()
        {

        }    

    //check sort "getSpecificType" method
    public function test_it_Repository_method_getSpecificType()
        {

        }

    //check sort "getByItem" method
    public function test_it_Repository_method_getByItem()
        {

        }

    //check sort "getByUser" method
    public function test_it_Repository_method_getByUser()
        {

        }

    //check sort "getPremium" method
    public function test_it_Repository_method_getPremium()
        {
            $premium_group = $this->user->groups()->create(['premium'=>'true']);

            $groups = Group::getPremium();

            $this->assertEquals($premium_group->id, $groups->first()->id);
        }

        //check sort "getExpired" method
    public function test_it_Repository_method_getExpired()
        {
          //add extra item with params
            $expired_item = factory(item::class)->create(['expires'=>Carbon\Carbon::now()]);
            $expired_group = $this->user->groups()->create(['expires'=>Carbon\Carbon::now()]);

            $groups = Group::getExpired();//->get() inside

            $this->assertEquals($expired_group->id, $groups->first()->id);

            $this->setExpectedException('Exception');

        }

        
    public function testIndexGroups()
    {
        $this->get('groups')->seeStatusCode(200);

        foreach($this->group as $group){
          $this->seeJson(['name'=>$group->name]);
        }

        //2

        $this->visit('/index/groups');
        //search
        $this->type('hgchgchgchg', 'date');
        $this->seePageIs('/index/groups');

        //sort
        $this->press('цена');
        $this->press('дата');

        //checkbox
        $this->check('null');
        $this->seePageIs('/index/groups');
        $this->check('null');
        $this->seePageIs('/index/groups');
        $this->check('null');
        $this->seePageIs('/index/groups');
        $this->check('null');
        $this->seePageIs('/index/groups');

        //sidebar
        $this->press('сантехника');

        $this->see('К нашему сожалению ничего ненайдено,измените условия поиска');
        $this->check('empty_form');
        $this->seePageIs('/index/groups');
        $this->see('You got message');
    }


}