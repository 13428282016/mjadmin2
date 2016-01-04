<?php

use Illuminate\Database\Seeder;

class MidUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mid_admin_role')->insert([
            [
                'role_id' => 1,
                'admin_id' => 1,
            ], [
                'role_id' => 2,
                'admin_id' => 1,
            ], [
                'role_id' => 3,
                'admin_id' => 2,
            ]
        ]);

    }
}
