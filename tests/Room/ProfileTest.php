<?php

class ProfileTest extends TestCase
{
    public function setUp()
    {   
        $this->createProfi();
    }
////////////////////////////////////
    //  Profi
////////////////////////////////////

    show page projects

        add project

        update project

        remove project

        add image to project

        remove image from project

        remove all image from project

////////////////////////////////////
    //  Owner
////////////////////////////////////

    show page rooms

        add room

        update room

        remove room

    add element to room

    remove element from room

    remove all elements from room

    //check method "RestartGroup"
    public function test_it_RestartGroup()
    {
      $this->group->JoinGroup($this->user);
      $this->group->RestartGroup($this->user);

      $this->assertEquals(0, $this->group->user_count);
    }

    public function test_add_Room()
    {
        $this->createTag();

        $owner = $this->createUser();
        $business = $this->createBusiness();
        $business->owners()->save($this->owner);
        $this->actingAs($this->owner);
        $this->visit(route('home'));
        $this->see($business->name);
        $this->seePageIs($business->slug.'/manage/dashboard');
    }    

    public function test_add_Project()
        $this->actingAs($this->user);
        $this->assertTrue(true);
    }    

    public function test_Remove_Room()
    {
        $this->assertTrue(true);
    }


    public function test_Remove_Project()
    {
        $this->assertTrue(true);
    }

    public function test_add_element_to_Room()
    {
        $this->assertTrue(true);
    }

    public function test_remove_element_from_Room()
    {
        $this->assertTrue(true);
    }

}
