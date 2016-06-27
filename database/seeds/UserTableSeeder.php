<?php

use Illuminate\Database\Seeder;
use App\Models\User\User;
use App\Models\_partials\Address;

class UserTableSeeder extends Seeder
{

    public function run()
    {
    	$users = [
    	    ['first_name' => 'admin',
    	        'type' => 'admin',
    	        'email' => 'znack@gmail.com',
    	        'password' => bcrypt('secret')],
    	    ['first_name' => 'shop',
    	      'type' => 'shop',
    	        'email' => '1@gmail.com',
    	        'password' => bcrypt('12345')],          
    	    ['first_name' => 'owner',
    	      'type' => 'owner',
    	        'email' => '2@gmail.com',
    	        'password' => bcrypt('12345')],          
    	    ['first_name' => 'profi',
    	      'type' => 'profi',
    	        'email' => '3@gmail.com',
    	        'password' => bcrypt('12345')],
    	];

    	foreach ($users as $user)
    	{
    	  DB::table('users')->insert($user); 
    	}

    	factory(User::class,'owner',20)->create()->each(function($user) {
    	          $user->addresses()->save(factory(Address::class)->create());
    	      });
    	factory(User::class,'profi',20)->create();
    	factory(User::class,'shop',20)->create();
    }
}
