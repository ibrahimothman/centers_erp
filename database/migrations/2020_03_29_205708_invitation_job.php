<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvitationCenterJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitation_centerJob', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('invitation_id');
            $table->timestamps();

            $table->foreign('job_id')->references('id')
                ->on('centerjobs')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('invitation_id')->references('id')
                ->on('invitations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitation_job_pivot_table');
    }
}
