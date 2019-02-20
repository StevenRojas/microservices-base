<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreUserTable extends Migration
{

    public function up()
    {
        Schema::create('store_user', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('store_id')
                ->references('id')
                ->on('store');
            $table->foreign('user_id')
                ->references('id')
                ->on('user');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('store_user');
    }
}
