<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminsTableSeeder::class);
         $this->call(RolesSeeder::class);
         $this->call(AuthoritySeeder::class);
         $this->call(AuthorityGroupSeeder::class);
         $this->call(MidUserRoleSeeder::class);
         $this->call(MidRoleAuthoritySeeder::class);
    }
}
