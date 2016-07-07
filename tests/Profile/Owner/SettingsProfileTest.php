<?php namespace App\Tests\Room;

class SettingsProfileTest extends TestCase
{

	public function test_show_my_settings()
    {
        $this->see($this->item->name);
        $this->seePageIs('items/'.$this->item->slug);
    }

	public function test_update_avatar()
    {
        $this->see($this->item->name);
        $this->seePageIs('items/'.$this->item->slug);
    }

	public function test_update_settings()
    {
        $this->see($this->item->name);
        $this->seePageIs('items/'.$this->item->slug);
    } 
}