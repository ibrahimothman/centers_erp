<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatementTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statement_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('body');

            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('id')->on('tests')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('center_id');
            $table->foreign('center_id')->references('id')->on('centers')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('statement_templates');
    }
}
