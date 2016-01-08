<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //游戏信息表
        Schema::create('game_info', function (Blueprint $table) {
            $table->increments('gameid');
            $table->integer('channel_id',false,true);           //频道ID
            $table->string('title',100)->nullable();            //标题
            $table->string('icon',100)->nullable();             //小图标
            $table->unsignedInteger('file_size')->default(0);   //文件大小
            $table->float('rating')->nullable();
            $table->string('package_name',100)->nullable();     //应用包名
            $table->string('package_path',100)->nullable();     //包名路径
            $table->integer('versionCode');                     //版本代码
            $table->string('versionName',100)->nullable();      //应用包名
            $table->string('platform',50)->default('android');  //平台类型:android,ipad,ihone,wp
            $table->string('linkUrl',255)->nullable();          //外部跳转链接
            $table->string('download_url',255)->nullable();     //下载链接
            $table->string('team',200)->nullable();             //开发者
            $table->unsignedInteger('teamid')->nullable();      //开发者id
            $table->string('img1_poster',100)->nullable();      //介绍图1
            $table->string('img2_poster',100)->nullable();      //介绍图2
            $table->string('img3_poster',100)->nullable();      //介绍图3
            $table->string('img4_poster',100)->nullable();      //介绍图4
            $table->string('img5_poster',100)->nullable();      //介绍图5
            $table->tinyInteger('status')->default(1);          //状态 1 白名单，0正常， -1 黑名单
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
        Schema::drop('game_info');
    }
}
