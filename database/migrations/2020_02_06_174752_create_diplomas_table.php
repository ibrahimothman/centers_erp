<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiplomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplomas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('duration');
            $table->string('cost');
            $table->string('description');
            $table->string('image');
            $table->string('number_of_lectures');
            $table->unsignedBigInteger('center_id');
            $table->timestamps();

            $table->foreign('center_id')->references('id')->on('centers')
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
        Schema::dropIfExists('diplomas');
    }
}
