<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolCourseCostHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_course_cost_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_courses_id')->unsigned();
            $table->dateTime('effective_date');
            $table->decimal('cost', 10, 2);
            $table->integer('created_by')->unsigned();
            //$table->integer('updated_by')->unsigned();
            $table->timestamps();
            $table->foreign('school_courses_id')->references('id')->on('school_courses');
            $table->foreign('created_by')->references('id')->on('users');
            //$table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('school_course_cost_history');
    }
}
