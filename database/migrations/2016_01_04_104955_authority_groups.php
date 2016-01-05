<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AuthorityGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_groups', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('order')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('authority_groups');
    }
}
