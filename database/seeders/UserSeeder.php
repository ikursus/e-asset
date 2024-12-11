<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([

            // User 1
            [
                'bahagian_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@demo.com',
                'password' => bcrypt('pass123'),
                'status' => 'active'
            ],
            // User 2
            [
                'bahagian_id' => 2,
                'name' => 'User',
                'email' => 'user@demo.com',
                'password' => bcrypt('pass123'),
                'status' => 'active'
            ],
            // User 3
            [
                'bahagian_id' => 2,
                'name' => 'Pemohon',
                'email' => 'pemohon@demo.com',
                'password' => bcrypt('pass123'),
                'status' => 'active'
            ],
        ]);
    }
}
