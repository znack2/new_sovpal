<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemUserTable extends Migration
{

    public function up()
    {
        Schema::create('item_user', function(Blueprint $table)
           {
               $table->increments('id')->index();
               $table->integer('user_id')->unsigned();
               $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
               $table->integer('item_id')->unsigned();
               $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
               $table->dateTime('how_long');//tool
               $table->integer('qty');//item-mat
               $table->dateTime('when');//all
               $table->timestamps();
               // indexes
               $table->index(['user_id','item_id']);
           });
    }


    public function down()
    {
        Schema::drop('item_user');
    }
}
