<?php

use App\Models\User\User;
use App\Models\_partials\Permission;
use App\Models\_partials\Role;

trait createUser
{
    protected $user;
    protected $address;

    protected function create()
	{
        //set basic info
        //set extra info
        //set skills
        //set image
        //set plan
        //assign address
        //see flash
		$this->address = Address::first();

		$this->user = factory(User::class)->create([ 
	        'user_id'=>$this->user->id,
	        'element_id'=>$this->element->id,
	    ]);
	}

    public function test_a_user_has_fields()
    {
    	$this->user->createItem($this->item);
    	$this->group->addUser($this->user);

        $this->assertEquals('Znack',$this->user->first_name);
        $this->assertEquals('Znack',$this->user->last_name);


            'provider_id',
            'provider',
            'activation_code',
            'activated_at',
            'first_name',
            'last_name',
            'level',
            'gender',
            'skills',
            'hour_cost',       
            'education',
            'own_remont',
            'with_designer',
            'phone',
            'phone_code',
            'refund_policy',
            'delivery_policy',
            'birthday',
            'join_count',
            'group_count',
            'room_count',
            'item_count',
            'element_count',
            'language',
            'last_login',
            'active',
        $this->assertEquals('znack', $this->item->email);
        $this->assertEquals('znack', $this->item->password);
        $this->assertEquals('znack', $this->item->type);
        $this->assertEquals('znack', $this->item->user_need);
        $this->assertEquals('znack', $this->item->expires);
        $this->assertEquals('znack', $this->item->item_count);
        $this->assertEquals('znack', $this->item->user_count);
        $this->assertEquals('znack', $this->item->type);
        $this->assertEquals('znack', $this->item->active);
        $this->assertEquals('znack', $this->item->complete);
        $this->assertEquals('znack', $this->item->premium);
    }



        $user = $this->createUser(['email' => 'guest@example.org', 'password' => bcrypt('demoguest'), 'username' => 'alariva']);
        $role = $this->createRole();
        $user->assignRole($role->name);
        $this->assertCount(1, $user->roles);
        $this->seeInDatabase('users', ['email' => $user->email, 'id' => $user->id, 'username' => $user->username]);
        // $this->assertEquals(strlen($user->username), 32);




    public function a_permission_belongs_to_many_roles()
    {
        $permission = $this->createPermission();
        $this->assertInstanceOf(Illuminate\Database\Eloquent\Relations\BelongsToMany::class, $permission->roles());
    }
    
    public function a_role_may_belong_to_a_user()
    {
        $user = $this->createUser();
        $role = $this->createRole();
        $user->roles()->save($role);
        $this->assertTrue($user->hasRole($role->name));
        $this->assertTrue($user->hasRole($user->roles));
    }

    public function a_role_establishes_permissions()
    {
        $role = $this->createRole();
        $this->assertInstanceOf(Illuminate\Database\Eloquent\Relations\BelongsToMany::class, $role->permissions());
    }

    public function a_role_gives_permissions()
    {
        $permission = $this->createPermission();
        $role = $this->createRole();
        $role->givePermissionTo($permission);
        $this->assertInstanceOf(Permission::class, $role->permissions()->first());
    }
}