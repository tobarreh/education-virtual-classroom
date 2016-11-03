<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    public function up()
    {
         Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        //Articles & Tags
        Schema::create('article_tag', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('article_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('article_tag', function (Blueprint $table) {
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('articles_tags');
        Schema::drop('tags');
    }
}
