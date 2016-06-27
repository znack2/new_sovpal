<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    public function up() {

                //create image for what item_id_type
            Schema::create('images', function(Blueprint $table) {
                $table->increments('id')->index();
                //create
                $table->enum('type',['item','avatar','element','tag','icon','room'])->default('icon');//'room','wallapeper','post','blog','address','website','ad','process'
                $table->string('alt', 256);
                $table->string('url', 128)->index();
                $table->enum('file', ['png','jpeg','jpg']);
                $table->timestamps();
            });

            Schema::create('imaggeds', function(Blueprint $table) {
                $table->increments('id')->index();
                $table->integer('image_id')->unsigned()->index();
                $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
                $table->morphs('imagged');
                 // indexes
                $table->index(['image_id','imagged_id','imagged_type']);
            });
        }

        public function down() {
            Schema::drop('imaggeds');
            Schema::drop('images');
        }
}
