<?php namespace App\Tests\Room;

class GroupProfileTest extends TestCase
{
	public function test_show_my_groups()
	    {
	        $this->see($this->item->name);
	        $this->seePageIs('items/'.$this->item->slug);
	    } 

	public function test_wuthdrow_from_Group()
	{
	    $this->assertTrue(true);
	}
}