<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
     {
        Schema::table('socialAccounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->references('id')->on('users');
            $table->string('provider_user_id');
            $table->string('provider');
            $table->timestamps();
        });
     }

    
     public function down()
     {
         Schema::drop('socialAccounts');
     }
}

