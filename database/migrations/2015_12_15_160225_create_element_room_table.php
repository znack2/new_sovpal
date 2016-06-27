<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementRoomTable extends Migration
{
    public function up()
    {
        Schema::create('element_room', function(Blueprint $table)
           {
               $table->increments('id')->index();
               $table->integer('room_id')->unsigned();
               $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
               $table->integer('element_id')->unsigned();
               $table->foreign('element_id')->references('id')->on('elements')->onDelete('cascade');
               $table->timestamps();
               // indexes
               $table->index(['room_id','element_id']);
           });
    }


    public function down()
    {
        Schema::drop('element_room');
    }
}
