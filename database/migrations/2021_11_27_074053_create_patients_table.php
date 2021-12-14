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
            $table->string('blood_group')->nullable()->default(' ');
            $table->string('height')->nullable()->default(' ');
            $table->string('weight')->nullable()->default(' ');
            $table->string('toilet_assistance')->nullable()->default(' ');
            $table->string('personal_care')->nullable()->default(' ');
            $table->string('fnd_information')->nullable()->default(' ');
            $table->string('house_work')->nullable()->default(' ');
            $table->string('access_information')->nullable()->default(' ');
            $table->string('care_plan')->nullable()->default(' ');
            $table->string('allergies')->nullable()->default(' ');
            $table->string('medications')->nullable()->default(' ');
            $table->string('immunizations')->nullable()->default(' ');
            $table->string('lab_results')->nullable()->default(' ');
            $table->string('additional_notes')->nullable()->default(' ');
            $table->foreign('patient_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('patient_id')->references('id')->on('patients');
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
