<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupUserTable extends Migration
{
    public function up()
    {
       Schema::create('group_user', function(Blueprint $table)
        {
            $table->increments('id')->index();
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('qty');
            $table->timestamps();
            // indexes
            $table->index(['group_id','user_id']);
        });
    }

    public function down()
    {
        Schema::drop('group_user');
    }
}
