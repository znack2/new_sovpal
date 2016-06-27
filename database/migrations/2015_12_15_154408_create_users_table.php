<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
     {
         Schema::create('users', function(Blueprint $table)
             {
                  $table->increments('id')->index();
                  $table->string('language',3)->default('ru');
                  //register
                  $table->string('password',255);
                  $table->string('email',32)->unique()->index();
                  $table->enum('type', ['owner','shop','profi','admin'])->default('owner');
                  //profile
                  $table->string('first_name',255)->nullable();
                  $table->string('last_name',255)->nullable();
                  $table->string('gender',3)->nullable();
                  $table->dateTime('birthday')->nullable();
                  $table->string('skills',255)->nullable();
                  $table->string('phone',20)->nullable();
                  $table->string('phone_code',3)->nullable();
                  $table->decimal('hour_cost',20)->nullable();
                  $table->string('education',255)->nullable();
                  $table->string('level')->default('new');
                  $table->text('refund_policy')->nullable();
                  $table->text('delivery_policy')->nullable();
                  $table->boolean('own_remont')->default(false);
                  $table->boolean('with_designer')->default(false);
                  //count
                  $table->integer('join_count')->default(0);
                  $table->integer('group_count')->default(0);
                  $table->integer('room_count')->default(0);
                  $table->integer('item_count')->default(0);
                  $table->integer('element_count')->default(0);
                  //security
                  $table->string('activation_code')->nullable();
                  $table->string('activated_at')->nullable();
                  $table->string('provider');
                  $table->string('provider_id');
                  $table->boolean('premium')->default(false);
                  $table->string('token')->nullable();
                  $table->boolean('active')->default(false);
                  $table->boolean('banned')->default(false);
                  $table->dateTime('last_login');
                  $table->timestamps();
                  $table->softDeletes();
                  $table->rememberToken()->index();

                  // indexes
                  $table->index(['first_name','last_name']);
             });
     }

    
     public function down()
     {
         Schema::drop('users');
     }
}

