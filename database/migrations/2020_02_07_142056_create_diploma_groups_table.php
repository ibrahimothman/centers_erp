<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiplomaGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diploma_groups', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('diploma_id');
            $table->unsignedBigInteger('instructor_id')->nullable();
            $table->date('starts_at');
            $table->unsignedSmallInteger('available_chairs');
            $table->timestamps();


            $table->foreign('diploma_id')->references('id')->on('diplomas')
                ->onDelete('cascade');
            $table->foreign('instructor_id')->references('id')->on('instructors')
                ->onDelete('Set Null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diploma_groups');
    }
}
