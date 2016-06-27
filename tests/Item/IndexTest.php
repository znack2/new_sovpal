<?php

class IndexTest extends TestCase
{

    public function test_SearchItems()
        {
        }

    public function test_ifEmptyItems()
        {
            show similar items or last 5 items
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



        

    

    public function testIndexItems()
    {
        $this->visit('/index/items');
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
        $this->seePageIs('/index/items');
    }

    public function testIndexTools()
    {
        $this->visit('/index/items');
        //sidebar
        $this->press('электрика');
        $this->press('ручные');
        $this->press('измерительные');
        $this->press('универсальные');

        //checkbox
        $this->check('null');
        $this->seePageIs('/index/items');
    }

    public function testIndexMaterials()
    {
        $this->visit('/index/items');

        //sidebar
        $this->press('столярные');
        $this->press('декор');
        $this->press('демонтажные');
        $this->press('электрика');
        $this->press('кованные');
        $this->press('монтажные');
        $this->press('другие');
        $this->press('лакокрасочные');
        $this->press('Паркетная доска');
        $this->press('сантехнические');
        $this->press('Керамическая плитка');

        //checkbox
        $this->check('null');
        $this->visit('/index/items');
    }
}