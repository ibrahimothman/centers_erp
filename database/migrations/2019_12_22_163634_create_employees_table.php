<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->default(1);
            $table->unsignedBigInteger('center_id');
            $table->string('nameAr');
            $table->string('nameEn');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('idNumber');
            $table->string('phoneNumberSec')->nullable();
            $table->string('passportNumber')->nullable();
            $table->string('image')->nullable();
            $table->string('idImage')->nullable();

            $table->unsignedBigInteger('payment_model');
            $table->longText('payment_model_meta_data');

            $table->foreign('payment_model')->references('id')
                ->on('payment_models');

            $table->unsignedBigInteger('job_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('setNull')->onUpdate('cascade');
            $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
