<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('code');
            $table->text('duration');
            $table->longText('description');
            $table->decimal('cost');
            $table->decimal('teamCost');
            $table->longText('content');
            $table->unsignedBigInteger('instructor_id');
            // $table->foreign('instructor_id')
            //     ->references("id")
            //     ->on("instructors");

            $table->unsignedBigInteger('center_id');
            // $table->foreign('center_id')
            //     ->references("id")
            //     ->on("centers");
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
