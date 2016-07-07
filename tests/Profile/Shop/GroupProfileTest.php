<?php namespace App\Tests\Room;

class ProfileTest extends TestCase
{
	public function test_show_my_groups()
	    {
	        $this->see($this->item->name);
	        $this->seePageIs('items/'.$this->item->slug);
	    } 


	public function test_Add_Group()
	{
	    $this->assertTrue(true);
	}

	public function test_Update_Group()
	{
	    $this->assertTrue(true);
	}

	public function test_Remove_Group()
	{
	    $this->assertTrue(true);
	}
}