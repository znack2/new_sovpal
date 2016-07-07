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
	        $this->signUpUser();
	        //check ui elements
	        $this->seeOneUI();
	    }

	public function seeOneUI()
		{
			$this
			  ->get('groups'.$this->group->id)
			  ->seeStatusCode(200)
			  ->seeJson(['id'=>$this->group->id,'title'=>$this->group->title]);

		  // show similar item

		  // show author 
			  
		  $this->seeHeader();
		  $this->seeProfile_Dropdown();

		  $this->seeMenu('one');
		  
		  $this->seeSidebar('one');
		  $this->seePagination();
		  $this->seeList();
		  //show one group show based item
		  $this->seeBlog('one');

		  $this->seeFooter();
		}  

	public function test_Cant_join_group()
	    {

	    }

	public function test_see_as_guest()
	    {

	    }
}   