<?php

class ProfileTest extends TestCase
{
     public function setUp()
    {   
        $this->createShop();
    }

    public function test_Create_Group()
    {
        $this->createItem();
        $this->createTags();
        $this->assertViewHas('foo', 'bar');
    }    
    
    show page groups

        add group

        update group

    public function test_Remove_Group()
    {
        $this->assertTrue(true);
    }

    unjoin group

    update group

}
