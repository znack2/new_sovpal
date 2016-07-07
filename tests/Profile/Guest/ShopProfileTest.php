<?php namespace App\Tests\Group;

use App\Tests\Traits\UiTest;
use App\Tests\Traits\signUpUser;

class ShopProfileTest extends TestCase
{
    public function setUp()
    {   
        $this->user = $this->createShop();
        $this->actingAs($this->user);
    }
    
    public function test_show_shop_setting()
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

    public function test_show_shop_groups()
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

    public function test_show_shop_items()
    {
        $this->actingAs($this->user)->delete('groups/1')->seeStatusCode(204)->isEmpty();
        $this->notSeeInDatabase('groups', ['id' => 1]);
    }     
}
