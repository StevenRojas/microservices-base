<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentStoreTable extends Migration
{

    public function up()
    {
        Schema::create('department_store', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned()->index();
            $table->integer('store_id')->unsigned()->index();
            $table->foreign('department_id')
                ->references('id')
                ->on('department');
            $table->foreign('store_id')
                ->references('id')
                ->on('store');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('department_store');
    }
}
