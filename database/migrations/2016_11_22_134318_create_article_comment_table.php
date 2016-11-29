<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCommentTable extends Migration
{
    public function up()
    {
        Schema::create('article_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('votes')->nullable();
            $table->integer('article_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('article_comment', function (Blueprint $table) {            
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('article_comment');
        Schema::disableForeignKeyConstraints();
    }

}
