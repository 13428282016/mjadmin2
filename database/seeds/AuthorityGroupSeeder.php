<?php

use Illuminate\Database\Seeder;

class AuthorityGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('authority_groups')->insert([
                [
                    'id' => 1,
                    'name' => '个人中心',
                    'order' => '1',

                ], [
                    'id' => 2,
                    'name' => '用户管理',
                    'order' => '2',

                ], [
                    'id' => 3,
                    'name' => '角色管理',
                    'order' => '3',

                ], [
                    'id' => 4,
                    'name' => '权限管理',
                    'order' => '4',

                ]
            ]
        );
    }
}
