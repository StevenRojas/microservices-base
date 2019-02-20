<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{

    public function up()
    {
        Schema::create('role_user', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('role_id')
                ->references('id')
                ->on('role');
            $table->foreign('user_id')
                ->references('id')
                ->on('user');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('role_user');
    }
}
