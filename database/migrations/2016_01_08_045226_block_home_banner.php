<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlockHomeBanner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //首页轮播图
        Schema::create('block_home_banner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100)->nullable();        //标题
            $table->string('img_url',255)->nullable();    //轮播图
            $table->string('link_path',255)->nullable();    //跳转链接
            $table->tinyInteger('is_ad')->default(0);   //1 广告，0非广告
            $table->string('desc',255)->nullable();    //描述
            $table->tinyInteger('status')->default(0);   //状态 1上架，0正常
            $table->integer('sorts')->default(0); //排序
            $table->timestamp('up_time');       //上架时间
            $table->timestamp('down_time');     //上架时间
            $table->string('audit_userid',20)->default(''); //审核用户
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
        Schema::drop('block_home_banner');
    }
}
