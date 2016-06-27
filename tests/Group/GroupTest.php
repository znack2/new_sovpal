<?php

class GroupTest extends TestCase
{
	show one group

		show based item

		show similar groups

		can not join if my group

		join group 

		withdrow from group 

		//check method "joinGroup"
 	public function test_join_group()
    {
		    $user2 = factory(User::class)->create();

		    $this->group->joinGroup($this->user,'2');

       	//check group has one user1 and method "users"
       	$this->assertCount(1, $this->group->users());

        //check how many items
        $this->assertEquals('2', $this->group->item_count);

        //check how many users
        $this->assertEquals('1', $this->group->user_count);

       	//check group has not user2 
       	$this->assertContains($user2->id, $this->group->users()->pluck('id'));

       	//check total and method "totalUsers"
       	$this->assertEquals(1, $this->group->user_count);
    }

//check method "withdrowFromGroup"
    public function test_it_withdrowFromGroup()
    {
      $this->group->JoinGroup($this->user);
      $this->group->withdrowFromGroup($this->user);

      $this->assertEquals(0, $this->group->user_count);
    }
}