<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectTracker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('project_tracker', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('site_inspection_scheduled')->default('0');
            $table->integer('site_inspection_completed')->default('0');
            $table->integer('project_accepted')->default('0');
            $table->integer('discom_application')->default('0');
            $table->integer('finance_application')->default('0');
            $table->integer('components_received')->default('0');
            $table->integer('installation')->default('0');
            $table->integer('compliance')->default('0');
            $table->integer('discom_commissioning_application')->default('0');
            $table->integer('commissioned')->default('0');
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
