<?php

class ProfileTest extends TestCase
{
     public function setUp()
    {   
        $this->createShop();
    }

    show page items
    show page orders

    public function test_add_Item()
    {
        $this->actingAs($this->user);
        $this->createElement();
        $this->createItem();
        $this->createTag();
        $this->assertViewHas('foo', 'bar');

        $this
          ->post('groups'.['title'=>'xxx','description'=>'xxx'])
          ->seeStatusCode(200)
          ->seeJson(['title'=>$this->group->title]);
    } 

    update item 
    update order  

    public function removeItem()
    {
        $this->actingAs($this->user)->delete('groups/1')->seeStatusCode(204)->isEmpty();
        $this->notSeeInDatabase('groups', ['id' => 1]);
    }    

    remove order
}
