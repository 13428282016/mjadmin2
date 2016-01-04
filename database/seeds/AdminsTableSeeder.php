<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('admins')->insert([
            [
            'id' => 1,
            'name' => '王名杰',
            'email' => '929936389@qq.com',
            'password' => bcrypt('123456'),
            'username' => 'wangmingjie',
            'cellphone' => '13428282016',
            'avatar' => 'https://laravel.com//assets/img/laravel-logo.png',
        ],
            [
                'id' => 2,
                'name' => '李世林',
                'email' => '929936389@qq.com',
                'password' => bcrypt('123456'),
                'username' => 'lishilin',
                'cellphone' => '13428282016',
                'avatar' => 'https://laravel.com//assets/img/laravel-logo.png',
            ], [
                'id' => 3,
                'name' => '超级管理员',
                'email' => '929936389@qq.com',
                'password' => bcrypt('root'),
                'username' => 'root',
                'cellphone' => '13428282016',
                'avatar' => 'https://laravel.com//assets/img/laravel-logo.png',
            ], [
                'id' => 4,
                'name' => '超级管理员',
                'email' => '929936389@qq.com',
                'password' => bcrypt('admin'),
                'username' => 'admin',
                'cellphone' => '13428282016',
                'avatar' => 'https://laravel.com//assets/img/laravel-logo.png',
            ]]);
    }
}
