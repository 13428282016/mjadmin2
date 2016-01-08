<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MovieInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //电影主表
        Schema::create('movie_info', function (Blueprint $table) {
            $table->increments('movieid');                  //电影ID
            $table->string('title',100)->nullable();        //标题
            $table->string('en_title',255)->nullable();     //英文标题
            $table->tinyInteger('demo')->default(0);        //0只有正片，1只有非正片，2两者都有
            $table->string('type',50)->default('movie');    //影片类型：movie,teleplay,anime,tv
            $table->tinyInteger('vip_enable')->default(0);  //1 vip，0非vip
            $table->unsignedInteger('vod_num')->default(0); //可播子集总数
            $table->unsignedInteger('play_times')->default(0); //播放次数
            $table->string('img_poster',255)->nullable();   //竖版海报图
            $table->string('img_stills',255)->nullable();   //横版海报图
            $table->string('img_background',255)->nullable(); //虚化背景图
            $table->string('keys',255)->nullable();         //关键字
            $table->timestamp('release_date');              //发布时间
            $table->unsignedInteger('last_week_pageview')->default(0); //上周vv
            $table->unsignedInteger('yesterday_pageview')->default(0); //昨日VV
            $table->string('desc',500)->nullable();         //子集描述
            $table->float('rating')->nullable();            //评分
            $table->tinyInteger('status')->default(1);      //状态 1上架，0正常 -1 删除
            $table->unsignedInteger('cpid')->default(1);    //cp信息
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
        Schema::drop('movie_info');
    }
}
