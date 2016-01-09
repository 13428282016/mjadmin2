<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameRelationTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //游戏与标签中间表
        Schema::create('game_relation_tag', function (Blueprint $table) {
            $table->unsignedInteger('gameid')->default(0);
            $table->unsignedInteger('tagid')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['gameid', 'tagid']);  //唯一索引
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('game_relation_tag');
    }
}
