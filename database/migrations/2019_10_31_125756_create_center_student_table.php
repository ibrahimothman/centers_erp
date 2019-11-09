<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenterStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('center_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();

            $table->foreign('center_id')->references('id')->on('centers');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('center_student');
    }
}
