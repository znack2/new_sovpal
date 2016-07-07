<?php namespace App\Tests\Room;

class ProfileTest extends TestCase
{
    public function test_show_my_projects()
        {
            $this->see($this->item->name);
            $this->seePageIs('items/'.$this->item->slug);
        } 

    public function test_Add_Project()
            $this->actingAs($this->user);
            $this->assertTrue(true);
        }   

    public function test_Update_Project()
        {
            $this->assertTrue(true);
        }

    public function test_Remove_Project()
        {
            $this->assertTrue(true);
        }

    public function test_add_Image_to_Project()
        {
            $this->assertTrue(true);
        }

    public function test_remove_Image_from_Project()
        {
            $this->assertTrue(true);
        }

    public function test_remove_all_Images_from_Project()
        {
            $this->assertTrue(true);
        }
}
