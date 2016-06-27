<?php

use App\Models\Item\Item;
use App\Models\Group\Group;
use App\Models\User\User;
use App\Models\_partials\Element;
use App\Models\_partials\Address;
use App\Models\Room\Room;
// use App\Models\Post\Post;

$factory->define(Item::class,function (Faker\Generator $faker) {
   return [
       'user_id'           => '',
       'title'             => $faker->unique()->name,
       'description'       => $faker->text,
       'element_id'        => $faker->numberBetween(1,90),
   ];
});

$factory->defineAs(Item::class, 'item' ,function (Faker\Generator $faker) use ($factory){

  $item = $factory->raw(Item::class);

    return array_merge($item, [
        'user_id'           => 2,
        'type'              => 'item',
        'order_condition'   => $faker->text,
        'default_price'     => $faker->numberBetween(500,50000),
      ]);
});

$factory->defineAs(Item::class, 'tool' ,function (Faker\Generator $faker) use ($factory){

  $item = $factory->raw(Item::class);
   return array_merge($item, [
      'user_id'           => 3,
      'type'              => 'tool',
      'condition'         => $faker->randomElement(['best', 'good','normal','poor']),
      'order_condition'   => $faker->text,
   ]);
});

$factory->defineAs(Item::class, 'material' ,function (Faker\Generator $faker) use ($factory){

  $item = $factory->raw(Item::class);
   return array_merge($item, [
      'user_id'           => 3,
      'type'              => 'material',
      'qty'               => $faker->text,
      'order_condition'   => $faker->text,
   ]);
});

$factory->defineAs(Item::class, 'material_private' ,function (Faker\Generator $faker) use ($factory){

  $item = $factory->raw(Item::class);
   return array_merge($item, [
      'type'              => 'material',
      'private'           => $faker->boolean,
   ]);
});

$factory->defineAs(Item::class, 'tool_private' ,function (Faker\Generator $faker) use ($factory){

  $item = $factory->raw(Item::class);
   return array_merge($item, [
        'type'              => 'tool',
        'private'           => $faker->boolean,
   ]);
});

$factory->defineAs(Item::class, 'item_premium' ,function (Faker\Generator $faker) use ($factory){

  $item = $factory->raw(Item::class);
   return array_merge($item, [
        'type'              => 'item',
        'premium'           => $faker->boolean,
   ]);
});










$factory->define(Group::class ,function (Faker\Generator $faker){
        return [
              'price'                 => $faker->numberBetween(500,50000),
              'item_id'               => Item::where('type','item')->first()->id,
              'user_id'               => '1',
              'type'                  => 'item',
              'user_need'             => $faker->randomElement(['1','10','25','50','100','500']),
              'owner_count'            => $faker->numberBetween(1,100),
              'expires'               => $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 25 days') ,
              'progress'              => $faker->numberBetween(1,100),
              'premium'               => $faker->boolean,
        ];
});






$factory->define(User::class,function (Faker\Generator $faker) {
    return [
        'first_name'    => $faker->firstName,
        'last_name'     => $faker->lastName,
        'email'         => $faker->safeEmail,
        'language'      => $faker->randomElement(['ru', 'en']),
        'password'      => bcrypt(str_random(10)),
        'remember_token'=> str_random(10),
        'gender'        => $faker->boolean,
    ];
});

$factory->define(Address::class, function (Faker\Generator $faker) {
    return [
        'street' => $faker->streetName,
        'house'  => $faker->buildingNumber,
        'corpus' => $faker->bothify('##??'),
    ];
});

$factory->defineAs(User::class, 'owner' ,function (Faker\Generator $faker) use ($factory){

    $item = $factory->raw(User::class);

    return array_merge($item, [
        'type'          => 'owner',
        'own_remont'    => $faker->boolean,
    ]);
});

$factory->defineAs(User::class, 'profi' ,function (Faker\Generator $faker) use ($factory){

    $item = $factory->raw(User::class);

    return array_merge($item, [
        'type'          => 'profi',
        'hour_cost'     => $faker->text,
        'education'     => $faker->text,
    ]);
});

$factory->defineAs(User::class, 'shop' ,function (Faker\Generator $faker) use ($factory){

    $item = $factory->raw(User::class);

    return array_merge($item, [
        'type'          => 'shop',
    ]);
});


  $factory->defineAs(Room::class, 'default' , function (Faker\Generator $faker) {

       $description = $faker->text;
       $type        = $faker->randomElement(['room'.'project']);
       $area        = $faker->numberBetween(1,100);
       $step        = $faker->randomElement(['demontaj','construction','finish','painting','furniture']);

      return [
          'type'                => $type,
          'description'         => $description,
          'area'                => $faker->numberBetween(30,200),
          'end_remont'          => $faker->dateTimeBetween('today', 'today +7 days')->format('Y-m-d'),
          'start_remont'        => $faker->dateTimeBetween('today', 'today +7 days')->format('Y-m-d'),
          'step'                => $step,
          'designer_id'         => factory(App\Models\User\User::class)->create()->id,
          'user_id'             => factory(App\Models\User\User::class)->create()->id,
          'meta_title'          => $type . $area .$step, 
          'meta_keywords'       => $faker->randomElement(['user_style','user_area','user_type','user_step']),
          'meta_description'    => $description
      ];    
  });   


  // $factory->define(Post::class,function (Faker\Generator $faker) {

  //     return [
  //         'user_id'       => factory(App\Models\User\User::class)->create()->id,
  //         'room_id'       => factory(App\Models\Room\Room::class,'default')->create()->id,
  //         'title'         => $faker->sentence(4),
  //         'body'          => $faker->text,
  //         'type'          => $faker->randomElement(['post', 'news','tip','ad','unknown']),
  //         'difficulty'    => $faker->randomElement(['unknown', 'easy', 'medium', 'hard']),
  //         'area'          => $faker->randomElement(['wall', 'floor', 'ceiling','unknown']),
  //         'link'          => $faker->url,
  //     ];
  // });


//  // $date = $faker->dateTimeBetween('today', 'today +7 days')->format('Y-m-d');
//  // Carbon::parse(date('Y-m-d 08:00:00', strtotime('today +2 days'))),
//  // 'birthdate'      => \Carbon\Carbon::now()->subYears(30)->format('m/d/Y'),
//  // 'date'      => date('Y-m-d', strtotime($date)),
//  // 'start_at'  => date('Y-m-d 00:00:00', strtotime($date)),


// $sampleInstance = app(App\Sample::class);
// $factory->define(App\User::class, function (Faker\Generator $faker, $attributes=array()) use($sampleInstance){
//     //...$attributes received      
//     return ['name' => $sampleInstance->doSomething(),];
// });

// $users = User::all();
// 'user_id' => $faker->unique()->randomElement($users->lists('id')),