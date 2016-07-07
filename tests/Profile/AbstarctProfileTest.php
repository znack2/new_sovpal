<?php namespace App\Tests\Group;

use App\Tests\Traits\UiTest;
use App\Tests\Traits\signUpUser;

class AbstractIndexTest extends TestCase
{
    use UiTest;

    public function setUp()
    {   
        //seed groups
        $this->seed();
        //login
        $this->createShop();
        $this->actingAs($this->user);
        $this->signUpUser();
        //check ui elements
        $this->seeProfileUI();
    }

	public function seeProfileUI()
	{
	  $this->seeHeader();
	  $this->seeProfile_Dropdown();

	  $this->seeMenu('profile');
	  
	  $this->seeSidebar('profile');
	  $this->seePagination();
	  $this->seeList();

	  $this->seeBlog('profile');

	  $this->seeFooter();
	}  
}