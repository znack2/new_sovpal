<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    public function up()
        {
            Schema::create('rooms', function(Blueprint $table)
                 {
                     $table->increments('id')->index();
                     //create
                     $table->string('title');
                     $table->string('privacyType');
                     $table->decimal('area',32)->nullable();
                     $table->timestamp('start_remont')->nullable();
                     $table->timestamp('end_remont')->nullable();
                     //count
                     $table->integer('item_count')->unsigned()->default(0);
                     $table->integer('element_count')->unsigned()->default(0);
                     //do
                     $table->enum('type', ['room','project','folder'])->default('room');
                     $table->integer('user_id')->unsigned()->index();
                     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
                     $table->integer('last_added_item_id')->unsigned()->nullable()->index();
                     $table->foreign('last_added_item_id')->references('id')->on('items')->onDelete('cascade');
                     $table->timestamps();
                 });
        }


        public function down()
        {
            Schema::drop('rooms');
        }
}
