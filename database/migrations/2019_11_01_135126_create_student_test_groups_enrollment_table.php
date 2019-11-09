<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTestGroupsEnrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_test_group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('student_id')->index();
            $table->unsignedBigInteger('test_group_id')->index();
            $table->integer('take')->default(0);
            $table->integer('result')->nullable();
            $table->timestamps();

//            $table->foreign('student_id')->references('id')->on('students');
//            $table->foreign('test_group_id')->references('id')->on('test-groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_testgroup');
    }
}
