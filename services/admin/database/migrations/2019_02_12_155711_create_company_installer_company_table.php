<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyInstallerCompanyTable extends Migration
{

    public function up()
    {
        Schema::create('company_installer_company', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->index();
            $table->integer('installer_company_id')->unsigned()->index();
            $table->foreign('company_id')
                ->references('id')
                ->on('company');
            $table->foreign('installer_company_id')
                ->references('id')
                ->on('installer_company');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('company_installer_company');
    }
}
