<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlockColumnContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //栏目内容信息
        Schema::create('block_column_content', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('columnid',false,true);         //栏目id
            $table->string('title',100)->nullable();        //标题
            $table->string('attract',100)->nullable();      //看点、子标题
            $table->tinyInteger('objectid',false,true);     //资源ID
            $table->string('img_poster',255)->nullable();   //竖版图 用于3n 显示
            $table->string('img_stills',255)->nullable();   //横版图 用于2n 显示
            $table->string('desc',255)->nullable();         //描述
            $table->tinyInteger('badge')->default(0);       //角标类型：1预告，2vip
            $table->tinyInteger('status')->default(0);      //状态 1上架，0正常
            $table->string('audit_userid',20)->default(''); //审核用户
            $table->integer('sorts')->default(0);           //排序
            $table->timestamp('up_time');    //上架时间
            $table->timestamp('down_time');    //上架时间
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
        Schema::drop('block_column_content');
    }
}
