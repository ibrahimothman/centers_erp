<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nameAr')->unique();
            $table->string('nameEn')->unique();
            $table->string('email')->unique();
            $table->string('phoneNumber')->unique();
            $table->string('idNumber')->unique();
            $table->string('phoneNumberSec')->nullable();
            $table->string('passportNumber')->nullable();
            $table->string('skillCardNumber')->unique()->nullable();
            $table->string('image')->nullable();
            $table->string('idImage')->nullable();
            $table->string('degree')->nullable();
            $table->string('faculty')->nullable();
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
        Schema::dropIfExists('students');
    }
}
