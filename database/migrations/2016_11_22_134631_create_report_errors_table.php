<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportErrorsTable extends Migration
{
    public function up()
    {
        Schema::create('report_errors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->boolean('solved')->default('0');
            $table->integer('user_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('report_errors', function (Blueprint $table) {            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::drop('report_errors');
        Schema::disableForeignKeyConstraints();
    }
}
