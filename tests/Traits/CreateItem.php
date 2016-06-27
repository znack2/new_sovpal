<?php

use App\Models\User\User;
use App\Models\Item\Item;
use App\Models\_partials\Element;

trait createItem
{
    protected $item;

    protected function create()
    {
        $this->createElement();

        $this->user = factory(User::class)->create();
        $this->item = factory(Item::class)->create([ 
            'user_id'=>$this->user->id,
            'element_id'=>$this->element->id,
            type
            price
            title
            description
            amount
            one main images
            other images(max 10)
            7) при вводе amount параметра таким же значением должно автоматически заполняться поле max параметра;
        ]);
    }


//fields
    public function test_it_has_fields()
    {
        $this->assertEquals('znack', $this->item->title);
        $this->assertEquals('znack', $this->item->description);
        $this->assertEquals('znack', $this->item->default_price);
        $this->assertEquals('znack', $this->item->user_need);
        $this->assertEquals('znack', $this->item->expires);
        $this->assertEquals('znack', $this->item->item_count);
        $this->assertEquals('znack', $this->item->user_count);
        $this->assertEquals('znack', $this->item->type);
        $this->assertEquals('znack', $this->item->active);
        $this->assertEquals('znack', $this->item->complete);
        $this->assertEquals('znack', $this->item->premium);
    }
}