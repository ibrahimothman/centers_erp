<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseRoomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_group_room', function (Blueprint $table) {
            $table->unsignedBigInteger('course_group_id');
            $table->unsignedBigInteger('room_id');
            $table->timestamps();

            $table->foreign('course_group_id')->references('id')->on('course_groups')
                ->onDelete('cascade');

            $table->foreign('room_id')->references('id')->on('rooms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_group');
    }
}
