<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorCenter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_instructor', function (Blueprint $table) {

            $table->unsignedBigInteger('instructorId');
            // $table->foreign('instructorId')
            //     ->references("id")
            //     ->on("instructor");

            $table->unsignedBigInteger('centerId');
            // $table->foreign('centerId')
            //     ->references("id")
            //     ->on("centers");

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
        Schema::dropIfExists('instructor_center');
    }
}
