<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentNurseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_nurse', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nurse_id')->nullable();
            $table->unsignedBigInteger('appointment_id')->nullable();

            $table->foreign('nurse_id')->references('id')->on('nurses');
            $table->foreign('appointment_id')->references('id')->on('appointments');
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
        Schema::dropIfExists('appointment_nurse');
    }
}
