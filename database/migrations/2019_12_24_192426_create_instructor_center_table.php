<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorCenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructor_center', function (Blueprint $table) {
            $table->unsignedBigInteger('instructor_id');
            $table->foreign('instructor_id')
                ->references("id")->on("instructor");
            $table->unsignedBigInteger('center_id');
            $table->foreign('center_id')
                ->references("id")
                ->on("centers");
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
