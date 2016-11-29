<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    public function up()
    {
        //Grade & Subjects
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->integer('matter_id')->unsigned();
            $table->integer('grade_id')->unsigned();


            $table->timestamps();
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->foreign('matter_id')->references('id')->on('matters')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('subjects');
        Schema::disableForeignKeyConstraints();
    }
}
