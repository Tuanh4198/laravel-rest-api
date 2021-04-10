<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompareToProject extends Migration
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
            $table->tinyInteger('project_compare_discom')->after('effective_system_size');
            $table->tinyInteger('project_compare_finance')->after('effective_system_size');
            $table->tinyInteger('project_compare_components')->after('effective_system_size');
            $table->tinyInteger('project_compare_installation')->after('effective_system_size');
            $table->tinyInteger('project_compare_compliance')->after('effective_system_size');
            $table->tinyInteger('project_compare_commissioning')->after('effective_system_size');
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
