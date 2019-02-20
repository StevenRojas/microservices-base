<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{

    public function up()
    {
        Schema::create('user', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 80);
            $table->string('email', 100)->unique();
            $table->string('secondary_email', 100)->nullable();
            $table->string('title', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('cell_phone', 20)->nullable();
            $table->boolean('notifications');
            $table->boolean('admin');
            $table->text('token')->nullable();
            $table->text('refresh_token')->nullable();
            $table->text('invite_key')->nullable();
            $table->integer('company_id')->unsigned();
            $table->integer('user_type_id')->unsigned();
            $table->integer('installer_company_id')->unsigned();
            $table->foreign('company_id')
                ->references('id')
                ->on('company');
            $table->foreign('user_type_id')
                ->references('id')
                ->on('user_type');
            $table->foreign('installer_company_id')
                ->references('id')
                ->on('installer_company');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('user');
    }
}
