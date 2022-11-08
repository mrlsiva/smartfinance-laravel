<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'role_id' => 1,
                'first_name'=>'Admin',
                'last_name'=>'Admin',
                'email'=>'info@smartfinservice.com',
                'phone'=>'8925392539',
                'password'=> bcrypt('admin@123456'),
                'is_finanace' => 0,
                'is_tax' => 0,
                'is_active' => 1,
                'is_lock' => 0,
                'is_delete' => 0,
                'is_profile_verified' => 2,
                'is_profile_updated' => 0,
                'is_reffer' => 0,
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
