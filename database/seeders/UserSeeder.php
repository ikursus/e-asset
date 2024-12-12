<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create( [
            'bahagian_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'password' => bcrypt('pass123'),
            'status' => 'active'
        ]);

        $user = User::create( [
            'bahagian_id' => 2,
            'name' => 'User',
            'email' => 'user@demo.com',
            'password' => bcrypt('pass123'),
            'status' => 'active'
        ]);

        // User 3
        $user2 = DB::table('users')->insert( [
            'bahagian_id' => 2,
            'name' => 'Pemohon',
            'email' => 'pemohon@demo.com',
            'password' => bcrypt('pass123'),
            'status' => 'active'
        ]);

        $admin->assignRole('admin');
        $user->assignRole('user');
    }
}
