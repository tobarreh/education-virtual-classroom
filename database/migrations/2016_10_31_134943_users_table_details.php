<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTableDetails extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('type', ['admin', 'professor', 'student'])->default('student')->after('remember_token');
            $table->date('birth_date')->nullable()->after('type');
            $table->string('cell_phone')->nullable()->after('birth_date');
            $table->string('city')->nullable()->after('cell_phone');
            $table->string('about_me')->nullable()->after('city');
            $table->text('twitter')->nullable()->after('about_me');
            $table->text('facebook')->nullable()->after('twitter');
            $table->text('linkedIn')->nullable()->after('facebook');
            $table->text('youtube')->nullable()->after('linkedIn');
        });
    }

    public function down()
    {
        $table->dropColumn('type');
        $table->dropColumn('birth_date');
        $table->dropColumn('cell_phone');
        $table->dropColumn('city');
        $table->dropColumn('about_me');
        $table->dropColumn('twitter');
        $table->dropColumn('facebook');
        $table->dropColumn('linkedIn');
        $table->dropColumn('youtube');
    }
}
