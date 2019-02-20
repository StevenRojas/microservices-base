<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{

    public function up()
    {
        Schema::create('store', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 80);
            $table->string('number', 20);
            $table->string('alt_id', 20)->nullable();
            $table->text('classifications')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('address1', 100)->nullable();
            $table->string('address2', 100)->nullable();
            $table->string('zipcode', 15)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->integer('company_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->foreign('company_id')
                ->references('id')
                ->on('company');
            $table->foreign('city_id')
                ->references('id')
                ->on('city');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('store');
    }
}
