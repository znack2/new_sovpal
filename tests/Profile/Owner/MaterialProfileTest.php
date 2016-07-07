<?php namespace App\Tests\Room;

class ProfileTest extends TestCase
{
    public function test_show_my_materials()
    {

    }   

    public function test_add_Material()
    {
        $this->actingAs($this->user);

        ->check("[name='remember']")
        ->press('Complete')
        ->attach($pathToFile, $elementName)
        
        $this->assertViewHas('foo', 'bar');

        $this->post('groups'.['title'=>'xxx','description'=>'xxx'])
             ->seeStatusCode(200)
             ->seeJson(['title'=>$this->group->title]);
    } 

    public function test_update_Material()
    {
        $this->actingAs($this->user)->delete('groups/1')->seeStatusCode(204)->isEmpty();
        $this->notSeeInDatabase('groups', ['id' => 1]);
    }    

    public function test_remove_Material()
    {
        $this->actingAs($this->user)->delete('groups/1')->seeStatusCode(204)->isEmpty();
        $this->notSeeInDatabase('groups', ['id' => 1]);
    }    
}