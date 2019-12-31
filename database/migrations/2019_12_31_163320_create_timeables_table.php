<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('time_id');
            $table->unsignedBigInteger('timeable_id');
            $table->string('timeable_type');
            $table->timestamps();

            $table->foreign('time_id')->references('id')
                ->on('times')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timeables');
    }
}
