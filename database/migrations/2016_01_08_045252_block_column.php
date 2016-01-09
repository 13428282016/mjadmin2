<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlockColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //栏目管理
        Schema::create('block_column', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100)->nullable();            //标题
            $table->tinyInteger('type')->default(1);            //栏目类型：1影视，2游戏
            $table->string('desc',255)->nullable();             //描述
            $table->tinyInteger('format')->default(1);          //版式 1(2n)，2(2n+1)，3(3n)，4(3n+1)
            $table->tinyInteger('status')->default(0);          //状态 1上架，0正常
            $table->integer('sorts')->default(0);               //排序
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
        Schema::drop('block_column');
    }
}
