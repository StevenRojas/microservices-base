<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{

    public function up()
    {
        Schema::create('company', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 80);
            $table->text('config')->nullable();
            // Constraints declaration
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('company');
    }
}
