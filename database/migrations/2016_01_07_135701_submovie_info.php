<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubmovieInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //电影子集表
        Schema::create('submovie_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movieid',false,true);          //影片id
            $table->integer('submovieid',false,true);       //子集id
            $table->string('title',100)->nullable();        //标题
            $table->string('attract',255)->nullable();      //看点,子标题
            $table->string('desc',500)->nullable();         //描述
            $table->integer('number',false,true)->nullable(); //集数
            $table->string('img_thumb',255)->nullable();    //子集截图
            $table->string('vodurl',255)->nullable();
            $table->string('vodurl_md5',32)->nullable();
            $table->string('gcid',40)->nullable();          //GCID
            $table->string('cid',40)->nullable();
            $table->tinyInteger('chaptertype')->default(1); //1正片，2预告片，3片花，4花絮，5独家片花，6精彩片段
            $table->integer('file_size');
            $table->string('file_ext');
            $table->integer('play_length');
            $table->tinyInteger('byte_type')->default(1);   //1,2,3,4(320P,480P,720P,1080P)
            $table->tinyInteger('substatus')->default(0);   //1 表示可播 0,未审核，1 已通过，2已屏蔽，3 修改待审，4预发布，6灰发布
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
        Schema::drop('submovie_info');
    }
}
