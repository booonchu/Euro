<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usercode',10);
            $table->string('name',50);
            $table->string('contact_email',50)->nullable();
            $table->string('contact_phone',50)->nullable();
            $table->string('address',2000)->nullable();
            $table->string('description')->nullable();
            $table->string('status',10);
            $table->integer('lastupdatedby')->references('id')->on('users');;
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
        Schema::drop('schools');
    }
}
