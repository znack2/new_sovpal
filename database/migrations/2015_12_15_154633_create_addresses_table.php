<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    public function up()
        {
            Schema::create('addresses', function(Blueprint $table)
            {
                   $table->increments('id')->index();
                   //create
                   $table->string('street',255);
                   $table->string('house',5);
                   $table->string('corpus',5)->nullable();
                   //count
                   $table->integer('user_count')->unsigned()->default(0);
                   //do
                   $table->boolean('active')->default(true);
                   $table->timestamps();
                   $table->softDeletes();
                   // indexes
                   $table->index(['street','house','corpus']);
            });
        }

        public function down()
        {
            Schema::drop('addresses');
        }
}
