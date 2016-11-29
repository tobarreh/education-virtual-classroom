<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterArticlesToolTable extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->text('tool')->nullable()->after('content');
        });
    }

 
    public function down()
    {
        $table->dropColumn('tool');    
    }
}
