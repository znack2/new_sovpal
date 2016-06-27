<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    public function up()
        {
            //created by default tag + how many times was used 
            Schema::create('tags', function(Blueprint $table) {
                $table->increments('id')->index();
                //create
                $table->enum('type', ['style','category','room','work','brand','country','house','tool','skill'])->default('category');
                $table->string('name', 255)->index();
                //count
                $table->integer('owner_count')->unsigned()->default(0);
                $table->integer('profi_count')->unsigned()->default(0);
                $table->integer('shop_count')->unsigned()->default(0);
                $table->integer('item_count')->unsigned()->default(0);
                $table->integer('tool_count')->unsigned()->default(0);
                $table->integer('material_count')->unsigned()->default(0);
                $table->integer('room_count')->unsigned()->default(0);
                $table->integer('group_count')->unsigned()->default(0);
                $table->integer('element_count')->unsigned()->default(0);
                $table->integer('address_count')->unsigned()->default(0);
                $table->integer('skill_count')->unsigned()->default(0);
                //security
                $table->boolean('active')->default(true);
                $table->timestamps();
            });

        //for what - item_id_type
            Schema::create('taggeds', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('tag_id')->unsigned()->index();
                $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
                $table->morphs('tagged');
                // indexes
                $table->index(['tag_id','tagged_id','tagged_type']);
            });
        }

        public function down()
        {
            Schema::drop('taggeds');
            Schema::drop('tags');
        }
}
