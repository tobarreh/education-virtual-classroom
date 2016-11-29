<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCommentAnswerTable extends Migration
{
    public function up()
    {
        Schema::create('article_comment_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('votes')->nullable();
            $table->integer('comment_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('article_comment_answer', function (Blueprint $table) {            
            $table->foreign('comment_id')->references('id')->on('article_comment')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('article_comment_answer');
        Schema::disableForeignKeyConstraints();
    }
}
