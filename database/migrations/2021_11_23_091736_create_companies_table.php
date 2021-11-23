<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('company_name');
            $table->string('company_website');
            $table->string('business_name');
            $table->integer('contact')->default(0);
            $table->string('contact_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('position')->nullable();
            $table->string('current_cqc_rating');
            $table->string('your_needs');
            $table->string('provide_staff');
            $table->string('staff_type');
            $table->string('hours_per_week');
            $table->string('full_time_employees');
            $table->string('cqc')->nullable();
            $table->string('insurance_proof')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('companies');
    }
}
