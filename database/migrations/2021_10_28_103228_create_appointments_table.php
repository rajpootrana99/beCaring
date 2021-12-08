<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('start_date');
            $table->string('day');
            $table->string('repeat')->default(0);
            $table->string('time');
            $table->string('specific_time')->nullable();
            $table->string('visit_duration');
            $table->string('no_of_carers');
            $table->string('hoist_required');
            $table->string('visit_information');
            $table->string('max_hourly_rate');
            $table->string('min_hourly_rate');
            $table->integer('status')->default(0);

            $table->foreign('company_id')->references('id')->on('users');
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
        Schema::dropIfExists('appointments');
    }
}
