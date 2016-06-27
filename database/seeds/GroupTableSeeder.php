<?php

use Illuminate\Database\Seeder;
use App\Models\Group\Group;
use App\Models\User\User;

class GroupTableSeeder extends Seeder
{
    public function run()
    {
        factory(Group::class,50)->create();

        $users = User::all();
        $group = Group::first();

        foreach($users as $user)
        {
        	$user->join_groups()->attach($group);
        }
    }
}
