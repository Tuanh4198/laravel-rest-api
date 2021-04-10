<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompareProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->integer('discom_commissioning_application')->after('effective_system_size')->default('0');
            $table->integer('compliance')->after('effective_system_size')->default('0');
            $table->integer('installation')->after('effective_system_size')->default('0');
            $table->integer('components')->after('effective_system_size')->default('0');
            $table->integer('finance_application')->after('effective_system_size')->default('0');
            $table->integer('discom_application')->after('effective_system_size')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
}
