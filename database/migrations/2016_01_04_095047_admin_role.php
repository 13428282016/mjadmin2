<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mid_admin_role', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('admin_id');
            $table->primary(['role_id','admin_id']);
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
        //
        Schema::drop('mid_admin_role');
    }
}
