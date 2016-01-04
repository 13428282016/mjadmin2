<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoleAuthority extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mid_role_authority', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('authority_id');
            $table->primary(['role_id','authority_id']);
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
        Schema::drop('mid_role_authority');
    }
}
