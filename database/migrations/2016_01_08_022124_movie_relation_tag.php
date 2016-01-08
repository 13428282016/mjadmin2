<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MovieRelationTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //电影与标签中间表
        Schema::create('movie_relation_tag', function (Blueprint $table) {
            $table->unsignedInteger('movieid')->default(0);
            $table->unsignedInteger('tagid')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['movieid', 'tagid']);  //唯一索引
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
