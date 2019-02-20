<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallerCompanyTable extends Migration
{

    public function up()
    {
        Schema::create('installer_company', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 80)->unique();
            $table->string('email_address', 100)->nullable();
            $table->string('contact_name', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('phone', 20)->nullable();
            // Constraints declaration
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('installer_company');
    }
}
