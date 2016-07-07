<?php namespace App\Tests\Group;

class GroupTest extends TestCase
{
    public function test_hire_user()
    {
      $this->group->JoinGroup($this->user);
      $this->group->withdrowFromGroup($this->user);

      $this->assertEquals(0, $this->group->user_count);
    }

    public function test_fire_user()
    {
      $this->group->JoinGroup($this->user);
      $this->group->withdrowFromGroup($this->user);

      $this->assertEquals(0, $this->group->user_count);
    }

    public function test_cant_hire_already()
    {
      $this->group->JoinGroup($this->user);
      $this->group->withdrowFromGroup($this->user);

      $this->assertEquals(0, $this->group->user_count);
    }
}