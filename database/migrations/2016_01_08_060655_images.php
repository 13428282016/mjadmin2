<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Images extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //图片库
        Schema::create('images', function (Blueprint $table) {
            $table->increments('imageid');
            $table->integer('objectid',false,true);             //资源id
            $table->tinyInteger('object_type')->default(1);     //资源类型：1影视，2游戏
            $table->string('file_name',50)->nullable();         //文件名
            $table->tinyInteger('file_size')->default(0);       //文件大小
            $table->string('file_type',50)->default('unknow/unknow');//文件类型
            $table->string('w_h',20)->nullable();               //宽高
            $table->string('audit_userid',20)->default('');     //审核用户
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
        Schema::drop('images');
    }
}
