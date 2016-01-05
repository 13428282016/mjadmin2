<?php

use Illuminate\Database\Seeder;

class AuthoritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('authorities')->insert([
            [
                'id' => 1,
                'name' => '用户管理-添加用户',
                'order' => '1',
                'location' => 'User@create|User@store',
                'group_id' => 2

            ], [
                'id' => 4,
                'name' => '用户管理-删除用户',
                'order' => '2',
                'location' => 'User@delete',
                'group' => 2
            ], [
                'id' => 2,
                'name' => '用户管理-查看用户列表',
                'order' => '3',
                'group' => 2,
                'location' => 'User@index',
            ], [
                'id' => 3,
                'name' => '用户管理-修改用户',
                'order' => '4',
                'group' => 2,
                'location' => 'User@edit|User@update',
            ]
        ]);
    }
}
