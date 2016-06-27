<?php

class ItemTest extends TestCase
{
	show one item

	    public function test_it_has_been_show()
	    {
	        $this
	          ->get('groups'.$this->group->id)
	          ->seeStatusCode(200)
	          ->seeJson(['id'=>$this->group->id,'title'=>$this->group->title]);
	    }

		order item

		can not order if my item

		can not order if has already ordered item

		show similar item

		show author 

	show one tool

		rent tool + setup time

	show one material

		exchange material

}




