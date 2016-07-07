<?php namespace App\Tests\Traits;

use App\Models\User\User;
use App\Models\Item\Item;
use App\Models\_partials\Element;

trait createItem
{
    protected $item;
    protected $tag;
    protected $element;

    protected function selectTag()
        {
            $this->element = Element::first();

            $this->user = factory(User::class)->create();
            $this->item = factory(Item::class)->create([ 
                'user_id'=>$this->user->id,
                'element_id'=>$this->element->id,
            ]);
            $this->assertTrue(true);
        }

    protected function selectElement()
        {
            $this->element = Element::first();

            $this->user = factory(User::class)->create();
            $this->item = factory(Item::class)->create([ 
                'user_id'=>$this->user->id,
                'element_id'=>$this->element->id,
            ]);
            $this->assertTrue(true);
        }

    protected function createItem($type,$element = null,$tag = null)
        {
            $element = $element ?: $this->selectElement();
            $tag = $tag ?: $this->selectTag();

            $this->user->items()->create([
                'element_id'=>$this->element->id,
                'type'=>'',
                'price'=>'',
                'title'=>'',
                'description'=>'',
                'amount' =>'',
                'active' =>'',
                'premium' =>'',
                ]);

            $this->item->tags()->save($tag);
            $this->item->images()->save($tag);//max 10

            при вводе amount параметра таким же значением 
            должно автоматически заполняться поле max параметра;
        }

    public function test_Item_has_fields()
        {
            $this->assertEquals('znack', $this->item->title);
            $this->assertEquals('znack', $this->item->description);
            $this->assertEquals('znack', $this->item->price);
            $this->assertEquals('znack', $this->item->type);
            $this->assertEquals('znack', $this->item->active);
            $this->assertEquals('znack', $this->item->amount);
            $this->assertEquals('znack', $this->item->premium);
        }
}