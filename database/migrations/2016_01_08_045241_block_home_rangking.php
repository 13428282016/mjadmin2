<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlockHomeRangking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //首页影视排行榜
        Schema::create('block_home_rangking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('objectid',false,true);             //影片id
            $table->string('title',100)->nullable();            //标题
            $table->string('rating',50)->nullable();            //评分
            $table->string('rating_reason',100)->nullable();    //上榜理由
            $table->integer('sorts')->default(0);               //排序
            $table->string('img_url',255)->nullable();          //轮播图
            $table->tinyInteger('status')->default(0);          //状态 1上架，0正常
            $table->timestamp('up_time');       //上架时间
            $table->timestamp('down_time');     //上架时间
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
        Schema::drop('block_home_rangking');
    }
}
