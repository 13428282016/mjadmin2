<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MovieChannel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //电影频道
        Schema::create('movie_channel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon',100)->nullable();
            $table->string('title',100)->nullable();            //频道标题
            $table->string('img_background',255)->nullable();   //频道背景图
            $table->string('desc',500)->nullable();
            $table->integer('sorts',false,true)->default(0);    //排序
            $table->tinyInteger('status')->default(1);          //状态 1上架，0正常 -1 删除
            $table->string('audit_userid',20)->default('');     //最后更新用户
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
        Schema::drop('movie_channel');
    }
}
