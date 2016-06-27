<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    public function up()
        {
            Schema::create('items', function(Blueprint $table)
                    {
                        $table->increments('id')->index();
                        //create
                        $table->string('title',100)->index();
                        $table->text('description',500);
                        $table->enum('condition', ['best','good','normal','poor'])->default('normal');
                        $table->integer('element_id')->unsigned()->index();
                        $table->foreign('element_id')->references('id')->on('elements')->onDelete('cascade');
                        //item
                        $table->decimal('default_price',6,2);
                        //tool
                        $table->string('order_condition')->nullable();
                        //mat
                        $table->integer('qty')->default(0);
                        //count
                        $table->integer('group_count')->default(0);
                        $table->integer('room_count')->default(0);
                        $table->integer('owner_count')->default(0);
                        //do
                        $table->enum('type', ['item','tool','material'])->default('item');
                        $table->integer('user_id')->unsigned()->index();
                        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                        $table->boolean('premium')->default(false);
                        $table->integer('private')->default(0);
                        $table->boolean('active')->default(true);
                        $table->integer('last_add_user_id');
                        $table->softDeletes();
                        $table->timestamps();
                    });
        }
       
        public function down()
        {
           Schema::drop('items');
        }
}
