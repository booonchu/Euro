<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('school_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->enum('status', [config('constants.STATUS_ACTIVE'), config('constants.STATUS_IN_ACTIVE')]);
            $table->integer('updated_by')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->unique(['school_id', 'course_id']);
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
