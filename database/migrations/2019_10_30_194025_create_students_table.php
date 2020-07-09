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
            $table->string('nameAr');
            $table->string('nameEn');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('idNumber');
            $table->string('phoneNumberSec')->nullable();
            $table->string('passportNumber')->nullable();
            $table->string('skillCardNumber')->nullable();
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
