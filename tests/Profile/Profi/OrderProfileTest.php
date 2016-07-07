<?php namespace App\Tests\Room;

class OrderProfileTest extends TestCase
{
	public function test_show_my_orders()
    {
    	//show users who hired me
        $this->see($this->item->name);
        $this->seePageIs('items/'.$this->item->slug);
    } 
}