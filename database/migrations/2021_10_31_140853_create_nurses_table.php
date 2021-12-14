<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nurse_id');
            $table->string('dob');
            $table->string('working_radius');
            $table->string('postal_code');
            $table->string('date_of_interview')->nullable()->default(' ');
            $table->string('promo_code')->nullable()->default(' ');
            $table->string('identification_document')->nullable()->default(' ');
            $table->string('dbs_certificate')->nullable()->default(' ');
            $table->string('care_qualification_certificate')->nullable()->default(' ');
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
        Schema::dropIfExists('nurses');
    }
}
