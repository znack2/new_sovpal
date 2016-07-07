<?php namespace App\Tests\Traits;

use App\Models\User\User;
use App\Models\Group\Group;
use App\Models\Item\Item;
use App\Models\_partials\Element;

trait createGroup
{
  protected $group;

  protected function createGroup()
    {
      $this->user->items()->save($this->item);
      $this->user->groups()->create(['item_id'=>$this->item->id,'type'=>'','expires'=>Carbon\Carbon::now()]);
    }

  public function test_Group_has_been_created()
    {
        $stored_users  = User::all();
        $stored_items  = Item::all();
        $stored_groups = Group::all();

        //without check database
        $this->assertEquals($this->user->id, $stored_users[1]->id);
        $this->assertEquals($this->item->id, $stored_items[1]->id);
        $this->assertEquals($this->group->id, $stored_groups[1]->id);

        //check database
        $this->seeInDatabase('users', ['id' => 1, 'name' => 'The Hobbit']);
        $this->seeInDatabase('items', ['id' => 1, 'name' => 'The Hobbit']);
        $this->seeInDatabase('groups', ['id' => 1, 'name' => 'The Hobbit']);
    }

    //has User
  public function test_Group_has_User()
    {
        $this->assertEquals($this->user->id, $this->group->user_id);
    }

//has Item
  public function test_Group_has_Item()
    {
        $this->assertContains($this->group->item_id, $this->user->items()->pluck('id'));
    }

  public function test_Group_has_fields()
    {
        $this->assertEquals($this->user->id, $this->group->type);
        $this->assertEquals('znack', $this->group->price);
        $this->assertEquals('znack', $this->group->user_need);
        $this->assertEquals('znack', $this->group->expires);
        $this->assertEquals('znack', $this->group->active);
        $this->assertEquals('znack', $this->group->complete);
        $this->setExpectedException('Exception');
    }    

    public function test_Group_is_premium()
    {
      $this->assertEquals('znack', $this->group->premium);
    }
}