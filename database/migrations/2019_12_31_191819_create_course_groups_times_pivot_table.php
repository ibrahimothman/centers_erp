<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseGroupsTimesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_group_time', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('time_id');
            $table->unsignedBigInteger('course_group_id');
            $table->timestamps();

            $table->foreign('time_id')->references('id')
                ->on('times')->onDelete('cascade');

            $table->foreign('course_group_id')->references('id')
                ->on('course_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_group_time');
    }
}
