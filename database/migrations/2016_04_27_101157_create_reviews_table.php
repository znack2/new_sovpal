<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function(Blueprint $table)
        {
            $table->increments('id')->index();
            $table->string('comment',255)->nullable();
            $table->integer('stars')->default(0);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            // indexes
            $table->index(['user_id']);
        });
    }

    public function down()
    {
        Schema::drop('reviews');
    }
}
