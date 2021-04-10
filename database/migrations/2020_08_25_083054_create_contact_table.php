<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id('id');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_adr_1');
            $table->string('contact_adr_2');
            $table->integer('contact_pincode');
            $table->string('contact_city');
            $table->string('contact_state');
            $table->string('contact_phone');
            $table->string('contact_mail');
            $table->string('contact_meu');
            $table->string('contact_visit');

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
        Schema::dropIfExists('contact');
    }
}
