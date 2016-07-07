<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CraeteNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('mails', function(Blueprint $tbl){
            $tbl->increments('id');
            $tbl->string('messages', 150);
            $tbl->string('link', 100);
            $tbl->string('image', 150);
            $tbl->boolean('status');
            $tbl->integer('user_id')->index();
            
            // $table->integer('from_user_id')->index();
            // $table->integer('topic_id')->index();
            // $table->integer('reply_id')->nullable()->index();
            // $table->text('body')->nullable();
            // $table->string('type')->index();


            $tbl->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('mails');
    }
}
