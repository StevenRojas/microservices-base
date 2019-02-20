<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration
{

    public function up()
    {
        Schema::create('city', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('state_code', 2);
            // Constraints declaration
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('city');
    }
}
