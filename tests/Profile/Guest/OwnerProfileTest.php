<?php namespace App\Tests\User;

class OwnerProfileTest extends TestCase
{
	public function setUp()
	{   
	    $this->user = $this->createShop();
	    $this->actingAs($this->user);
	}
	
	public function test_show_owner_setting()
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
}
