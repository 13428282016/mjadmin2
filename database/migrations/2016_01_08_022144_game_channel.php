<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameChannel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //电影标签表
        Schema::create('game_channel', function (Blueprint $table){
            $table->increments('id');
            $table->string('icon',100)->nullable();
            $table->string('title',200)->nullable();
            $table->string('img_background',255)->nullable();  //频道背景图
            $table->string('desc',500)->nullable();
            $table->integer('sorts',false,true)->default(0); //不自增，unsigned
            $table->tinyInteger('status')->default(1); //状态 1上架，0正常 -1 删除
            $table->string('audit_userid',20)->default(''); //最后更新用户
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
        Schema::drop('game_channel');
    }
}
