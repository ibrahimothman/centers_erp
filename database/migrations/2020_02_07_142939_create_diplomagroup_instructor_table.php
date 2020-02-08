<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiplomagroupInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diploma_group_instructor', function (Blueprint $table) {
            $table->unsignedBigInteger('diploma_group_id');
            $table->unsignedBigInteger('instructor_id');
            $table->timestamps();

            $table->foreign('diploma_group_id')->references('id')->on('diploma_groups')
                ->onDelete('cascade');

            $table->foreign('instructor_id')->references('id')->on('instructors')
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
        Schema::dropIfExists('diploma_group_instructor');
    }
}
