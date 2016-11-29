<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleQuestionAnswerTable extends Migration
{
    public function up()
    {
        Schema::create('article_question_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('votes')->nullable();
            $table->integer('question_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('article_question_answer', function (Blueprint $table) {            
            $table->foreign('question_id')->references('id')->on('article_question')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('article_question_answer');
        Schema::disableForeignKeyConstraints();
    }
}
