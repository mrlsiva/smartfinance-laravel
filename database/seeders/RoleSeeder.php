<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "Super Admin",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('roles')->insert([
            'name' => "Admin",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
        DB::table('roles')->insert([
            'name' => "User",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
    }
}
