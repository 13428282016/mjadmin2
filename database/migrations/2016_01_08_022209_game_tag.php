<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //游戏标签表
        Schema::create('game_tag', function (Blueprint $table){
            $table->increments('id');
            $table->string('title',100)->nullable();//标签名称
            $table->string('type',50)->nullable();//标签类型
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
        Schema::drop('game_tag');
    }
}
