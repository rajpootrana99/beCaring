<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('dob');
            $table->string('blood_group');
            $table->string('height');
            $table->string('weight');
            $table->string('allergies')->nullable();
            $table->string('medications')->nullable();
            $table->string('immunizations')->nullable();
            $table->string('lab_results')->nullable();
            $table->string('additional_notes')->nullable();
            $table->foreign('patient_id')->references('id')->on('users');
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
        Schema::dropIfExists('patients');
    }
}
