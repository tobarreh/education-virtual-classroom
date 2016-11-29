<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMattersTable extends Migration
{
   public function up()
    {
        Schema::create('matters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);           
            
            $table->integer('category_id')->unsigned();
            $table->string('image');

            $table->timestamps();
        });

        Schema::table('matters', function (Blueprint $table) {            
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('matters');
        Schema::disableForeignKeyConstraints();
    }
}
