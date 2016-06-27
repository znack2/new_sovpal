<?php

use Illuminate\Database\Seeder;
use App\Models\_partials\Review;
use App\Models\User\User;

class ReviewTableSeeder extends Seeder
{
    public function run()
    {
        factory(Review::class,20)->create();

        $users = User::all();
        $review = Review::first();

        //create many users create many reviews

        foreach($users as $user)
        {
            $user->reviews()->attach($review);
        }
    }
}
