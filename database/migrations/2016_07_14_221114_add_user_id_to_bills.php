<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function($table) {
            $table->increments('id');
            $table->string('path');
            $table->string('mime_type');
            $table->integer('size');
            $table->string('name');
            $table->timestamps();
        });
        Schema::table('bills', function (Blueprint $table) {
            //
            $table->integer('user_id')->after('id');
            $table->integer('image_id')->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('images');
      Schema::table('bills', function (Blueprint $table) {
          //
        $table->dropColumn(['user_id', 'image_id']);
      });
    }
}
