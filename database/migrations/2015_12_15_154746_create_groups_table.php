<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    public function up()
       {
           Schema::create('groups', function(Blueprint $table)
           {
               $table->increments('id')->index();
               //create
               $table->decimal('price',6);
               $table->integer('item_id')->unsigned()->index();
               $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
               $table->timestamp('expires');//time when will finish
               $table->enum('user_need', ['1','10','25','50','100','500']);
               //count
               $table->integer('item_count')->unsigned()->default(0);
               $table->integer('owner_count')->unsigned()->default(0);
               //do
               $table->enum('type', ['purchase','remont'])->default('purchase');
               $table->integer('user_id')->unsigned()->index();
               $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
               $table->integer('progress')->default(0);
               $table->boolean('premium')->default(false);
               $table->timestamp('complete');//time when complete
               $table->timestamps();
               $table->boolean('active')->default(true);
           });
       }


       public function down()
       {
           Schema::drop('groups');
       }
}
