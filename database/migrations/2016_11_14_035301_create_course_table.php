<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_category_id')->unsigned();
            $table->string('usercode',10)->unique();
            $table->string('name',50);
            $table->integer('total_classes');
            $table->integer('class_hours');
            $table->boolean('is_non_kawai')->default(1);
            $table->decimal('standard_cost', 10, 2);
            $table->decimal('standard_saleprice', 10, 2);
            $table->string('description',2000)->nullable();
            $table->enum('status', [config('constants.STATUS_ACTIVE'), config('constants.STATUS_IN_ACTIVE')]);
            $table->integer('listorder')->unsigned()->default(0);
            $table->integer('updated_by')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->foreign('course_category_id')->references('id')->on('course_categories');
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
