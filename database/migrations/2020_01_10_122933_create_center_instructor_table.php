<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenterInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centers_instructors', function (Blueprint $table) {
            $table->unsignedBigInteger('instructor_id');
            $table->foreign('instructor_id')
                ->references("id")
                ->on("instructors")
                ->onDelete('cascade');

            $table->unsignedBigInteger('center_id');
            $table->foreign('center_id')
                ->references("id")
                ->on("centers")
                ->onDelete('cascade');


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
        Schema::dropIfExists('centers_instructors');
    }
}
