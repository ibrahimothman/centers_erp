<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_takes', function (Blueprint $table) {
            $table->bigIncrements('id');

//            $table->unsignedBigInteger('student_id');
//            $table->foreign('student_id')->references('id')->on('students')
//                ->onUpdate('cascade')->onDelete('cascade');
//
//            $table->unsignedBigInteger('enrollment_id');
//            $table->foreign('enrollment_id')->references('id')->on('student_test_group');
//
//            $table->boolean('attended');
//
//            $table->string('photo');

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
        Schema::dropIfExists('test_take');
    }
}
