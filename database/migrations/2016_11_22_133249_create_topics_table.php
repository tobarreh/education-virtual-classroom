<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);           
            
            $table->integer('subject_id')->unsigned();

            $table->timestamps();
        });
        
        Schema::table('topics', function (Blueprint $table) {            
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('topics');
        Schema::disableForeignKeyConstraints();
    }
}
