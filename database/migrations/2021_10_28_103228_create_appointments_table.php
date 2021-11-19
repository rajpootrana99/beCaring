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
            $table->unsignedBigInteger('nurse_id')->nullable();
            $table->string('date');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('price');
            $table->string('max_price');
            $table->string('min_price');
            $table->string('bid_price')->nullable();
            $table->integer('status')->default(0);
            $table->integer('is_complete')->default(0);

            $table->foreign('nurse_id')->references('id')->on('users');
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
