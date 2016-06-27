<?php

use App\Models\User\User;
use App\Models\Group\Group;
use App\Models\Item\Item;
use App\Models\_partials\Element;

trait createGroup
{
  protected $group;
  protected $user;
  protected $item;

  protected function create()
    {
    $this->createElement();
    $this->user = factory(User::class)->create();
    $this->user->items()->create(['element_id'=>$this->element->id]);
    $this->user->groups()->create(['item_id'=>$this->item->id,'type'=>'']);
    }

//check all created
    public function test_it_has_been_created()
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
  public function test_it_has_User()
    {
        $this->assertEquals($this->user->id, $this->group->user_id);
    }

//has Item
  public function test_it_has_Users_Item()
    {
        $this->assertContains($this->group->item_id, $this->user->items()->pluck('id'));
    }

//check Group's type
  public function test_it_has_Type()
    {
        $this->assertEquals($this->user->id, $this->group->type);
    }

//fields
  public function test_it_has_fields()
    {
        $this->assertEquals('znack', $this->group->price);
        $this->assertEquals('znack', $this->group->user_need);
        $this->assertEquals('znack', $this->group->expires);
    }    

//check active
    public function test_it_is_active()
    {
        $this->assertEquals('znack', $this->group->active);
    }

//check group complete
    public function test_it_is_completed()
    {
      $this->assertEquals('znack', $this->group->complete);
      $this->setExpectedException('Exception');
    }

//check group complete
    public function test_it_is_premium()
    {
      $this->assertEquals('znack', $this->group->premium);
    }
}