<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolLoyaltyFeeHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_loyalty_fee_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->dateTime('effective_date');
            $table->float('loyalty_fee', 8, 2);
            $table->integer('lastupdatedby')->unsigned();
            $table->timestamps();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('lastupdatedby')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('school_loyalty_fee_history');
    }
}
