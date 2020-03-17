<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('account');
            $table->unsignedDecimal('amount');
            $table->unsignedDecimal('rest');
            $table->date('date');
            $table->longText('meta_data');
            $table->unsignedBigInteger('center_id');
            $table->timestamps();

            $table->foreign("center_id")->references('id')->on('centers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income_transactions');
    }
}
