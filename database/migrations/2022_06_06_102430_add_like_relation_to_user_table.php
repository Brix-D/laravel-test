<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLikeRelationToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_article', function (Blueprint $table) {
            //
            $table->
        });
        Schema::table('users', function (Blueprint $table) {
            //
            $table->
        });

        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('user', function (Blueprint $table) {
            //
        });

        Schema::table('articles', function (Blueprint $table) {
            //
        });
        Schema::dropIfExists('user_article');
    }
}
