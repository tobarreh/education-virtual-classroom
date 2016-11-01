<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);           
            
            $table->integer('category_id')->unsigned();
            $table->string('image');

            $table->timestamps();
        });

        Schema::table('subjects', function (Blueprint $table) {            
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('subjects');
    }
}
