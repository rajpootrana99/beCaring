<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->unique()->default(' ');
            $table->string('password')->nullable()->default(' ');
            $table->string('phone')->nullable()->default(' ');
            $table->string('image')->nullable()->default(' ');
            $table->string('address')->nullable()->default(' ');
            $table->string('address_latitude')->nullable()->default(' ');
            $table->string('address_longitude')->nullable()->default(' ');
            $table->unsignedBigInteger('parent_id')->nullable()->default(0);
            $table->integer('is_approved')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
