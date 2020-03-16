<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nameAr');
            $table->string('nameEn');
            $table->string('email')->unique();
            $table->string('phoneNumber')->unique();
            $table->string('idNumber')->unique();
            $table->string('phoneNumberSec')->nullable();
            $table->string('passportNumber')->nullable();
            $table->string('image')->nullable();
            $table->string('idImage')->nullable();
            $table->string('bio')->nullable();

            $table->unsignedBigInteger('payment_model')->default(0);
            $table->longText('payment_model_meta_data');

            $table->foreign('payment_model')->references('id')
                ->on('payment_models');


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
        Schema::dropIfExists('instructors');
    }
}
