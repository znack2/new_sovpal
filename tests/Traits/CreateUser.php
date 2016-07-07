<?php namespace App\Tests\Traits;

use App\Models\User\User;
use App\Models\_partials\Permission;
use App\Models\_partials\Role;

trait createUser
{
    protected $user;
    protected $address;

    protected function createUser($type)
    	{
            $this->user = factory(User::class)->create([ 
                'user_id'=>$this->user->id,
                'element_id'=>$this->element->id,
            ]);
            //set basic info
            //set extra info
            //set skills
            //set image
            //set plan
            //assign address
            //see flash
    		$this->address = Address::first();

            $user->roles()->save($this->selectRole());
            $role->givePermissionTo($this->selectPermission());

            $this->assertTrue($user->hasRole($role->name));
            $this->assertTrue($user->hasRole($user->roles));
            $this->assertInstanceOf(BelongsToMany::class, $permission->roles());
            $this->assertInstanceOf(BelongsToMany::class, $role->permissions());
            $this->assertInstanceOf(Permission::class, $role->permissions()->first());
    	}

    protected function test_User_has_fields()
        {
        	$this->user->createItem($this->item);
        	$this->group->addUser($this->user);

            $this->assertEquals('provider_id', $this->item->email);
            $this->assertEquals('provider', $this->item->password);
            $this->assertEquals('activation_code', $this->item->type);
            $this->assertEquals('activated_at', $this->item->user_need);
            $this->assertEquals('first_name', $this->item->expires);
            $this->assertEquals('last_name', $this->item->item_count);
            $this->assertEquals('gender', $this->item->user_count);
            $this->assertEquals('skills', $this->item->type);
            $this->assertEquals('hour_cost', $this->item->active);
            $this->assertEquals('education', $this->item->complete);
            $this->assertEquals('with_designer', $this->item->premium);
            $this->assertEquals('own_remont', $this->item->premium);
            $this->assertEquals('phone', $this->item->premium);
            $this->assertEquals('phone_code', $this->item->premium);
            $this->assertEquals('refund_policy', $this->item->premium);
            $this->assertEquals('delivery_policy', $this->item->premium);
            $this->assertEquals('birthday', $this->item->premium);
            $this->assertEquals('join_count', $this->item->premium);
            $this->assertEquals('group_count', $this->item->premium);
            $this->assertEquals('room_count', $this->item->premium);
            $this->assertEquals('item_count', $this->item->premium);
            $this->assertEquals('element_count', $this->item->premium);
            $this->assertEquals('language', $this->item->premium);
            $this->assertEquals('last_login', $this->item->premium);
            $this->assertEquals('premium', $this->item->premium);
        }

        $user = $this->createUser(['email' => 'guest@example.org', 'password' => bcrypt('demoguest'), 'username' => 'alariva']);
        $role = $this->createRole();
        $user->assignRole($role->name);
        $this->assertCount(1, $user->roles);
        $this->seeInDatabase('users', ['email' => $user->email, 'id' => $user->id, 'username' => $user->username]);
        // $this->assertEquals(strlen($user->username), 32);
}