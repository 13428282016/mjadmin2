<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MovieTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //电影标签表
        Schema::create('movie_tag', function (Blueprint $table){
            $table->increments('id');
            $table->string('title',100)->nullable();
            $table->string('type',50)->nullable();//标签类型
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movie_tag');
    }
}
