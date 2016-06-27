<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressUserTable extends Migration
{
    public function up()
    {
         Schema::create('address_user', function(Blueprint $table)
         {
             $table->increments('id')->index();
             $table->integer('address_id')->unsigned();
             $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->timestamps();
             // indexes
             $table->index(['address_id','user_id']);
         });
    }

    public function down()
    {
        Schema::drop('address_user');
    }
}
