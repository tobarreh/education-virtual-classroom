<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->integer('seen')->nullable();

            $table->integer('user_id')->unsigned();
            $table->integer('topic_id')->unsigned();

            $table->timestamps(); 
        });

        Schema::table('articles', function (Blueprint $table) {            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('articles');
    }
}
