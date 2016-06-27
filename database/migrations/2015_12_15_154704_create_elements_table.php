<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementsTable extends Migration
{
    public function up()
       {
        Schema::create('elements', function(Blueprint $table)
          {
              $table->increments('id')->index();
              //create
              $table->string('name',255)->index();
              $table->enum('type', ['item','tool','material'])->default('item');
              //count
              $table->integer('item_count')->unsigned()->default(0);
              $table->integer('room_count')->unsigned()->default(0);
              //admin
              $table->boolean('active')->default(true);
              $table->timestamps();
          });
       }

       public function down()
       {
           Schema::drop('elements');
       }
}
