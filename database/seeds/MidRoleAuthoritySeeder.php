<?php

use Illuminate\Database\Seeder;

class MidRoleAuthoritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //   //
        DB::table('mid_role_authority')->insert([
            [
                'role_id' => 1,
                'authority_id' => 1,

            ], [
                'role_id' => 2,
                'authority_id' => 1,

            ], [
                'role_id' => 2,
                'authority_id' => 2,

            ], [
                'role_id' => 3,
                'authority_id' => 1,

            ], [
                'role_id' => 3,
                'authority_id' => 2,

            ],
            [
                'role_id' => 3,
                'authority_id' => 3,

            ],
            [
                'role_id' => 4,
                'authority_id' => 1,

            ], [
                'role_id' => 4,
                'authority_id' => 2,

            ], [
                'role_id' => 4,
                'authority_id' => 3,

            ], [
                'role_id' => 4,
                'authority_id' => 4,

            ]
        ]);
    }
}
