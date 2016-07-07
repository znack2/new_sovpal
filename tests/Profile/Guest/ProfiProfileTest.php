<?php namespace App\Tests\Group;

use App\Tests\Traits\UiTest;
use App\Tests\Traits\signUpUser;

class ProfiProfileTest extends TestCase
{
    public function setUp()
    {   
        $this->user = $this->createOwner();
        $this->actingAs($this->user);
    }

    public function test_show_profi_setting()
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

    public function test_show_profi_projects()
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