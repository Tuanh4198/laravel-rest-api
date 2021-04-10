<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataInstaller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('data_installer', function (Blueprint $table) {
            $table->id('id');
            $table->string('installer_name');
            $table->string('installer_phone');
            $table->string('installer_email');
            $table->string('installer_adr_1');
            $table->string('installer_adr_2');
            $table->string('installer_city');
            $table->string('installer_state');
            $table->integer('installer_pincode');
            
            $table->string('installer_number_of_project');
            $table->string('installer_total_installer');
            $table->string('installer_maximum_installer');
            $table->string('installer_number_of_employees');
            $table->string('installer_maximum_distance');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
