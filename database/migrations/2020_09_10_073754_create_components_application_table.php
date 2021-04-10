<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components_application', function (Blueprint $table) {
            $table->id();
            $table->integer('panels_ordered');
            $table->integer('panels_received');
            $table->integer('inverter_ordered');
            $table->integer('inverter_received');
            $table->integer('frame_ordered');
            $table->integer('frame_received');
            $table->integer('wire_ordered');
            $table->integer('wire_received');
            $table->integer('accessories_ordered');
            $table->integer('accessories_received');
            $table->integer('monitoring_system_ordered');
            $table->integer('monitoring_system_received');
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
        Schema::dropIfExists('components_application');
    }
}
