<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeables', function (Blueprint $table) {
            $table->unsignedBigInteger('time_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('timeable_id');
            $table->string('timeable_type');
            $table->timestamps();

            $table->foreign('time_id')->references('id')
                ->on('times')->onDelete('cascade');

            $table->foreign('room_id')->references('id')
                ->on('rooms')->onDelete('cascade');

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
