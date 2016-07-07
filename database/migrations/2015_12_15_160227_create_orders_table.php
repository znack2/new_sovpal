<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('orders', function(Blueprint $table)
           {

              $table->datetime('completed_at');
              $table->string('number');
              $table->integer('items_total');
              $table->integer('total');
              $table->boolean('confirmed');
              $table->string('confirmation_token');
              $table->string('state');
              $table->string('email');

//orders-items
              $table->unsignedInteger('orders_id');
              $table->integer('quantity');
              $table->integer('unit_price');
              $table->integer('total');
              $table->foreign('orders_id')
                  ->references('id')->on('orders')
                  ->onDelete('cascade');

           

               $table->increments('id');
               $table->string('type');
               $table->integer('item_id')->unsigned();
               $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');

               $table->integer('item_count');

               $table->integer('user_id')->unsigned();
               $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');     
               $table->integer('address_id')->unsigned();
               $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
               $table->integer('seller_id')->unsigned()->nullable();
               $table->foreign('seller_id')->references('id')->on('users');
               
               // $table->enum('status', array_keys(trans('globals.order_status')));
               // $table->enum('type', ['cart', 'wishlist', 'order', 'later', 'freeproduct']);
               $table->string('description')->nullable();
               $table->dateTime('end_date')->nullable(); //cancelled or paid
               $table->integer('rate')->nullable();
               $table->string('rate_comment')->nullable();
               $table->boolean('rate_mail_sent')->default(false);
               $table->boolean('active')->default(true);
               $table->timestamps();
                $table->softDeletes();
               // indexes
               $table->index(['item_id','address_id','user_id','type']);
           });
    }


    public function down()
    {
        Schema::drop('orders');
    }
}
