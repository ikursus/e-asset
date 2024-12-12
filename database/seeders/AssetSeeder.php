<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assets')->insert([
            ['nama' => 'Projector', 'kuantiti' => 3, 'status' => 'available'],
            ['nama' => 'Laptop', 'kuantiti' => 4, 'status' => 'available'],
            ['nama' => 'Printer', 'kuantiti' => 2, 'status' => 'available'],
            ['nama' => 'Monitor', 'kuantiti' => 5, 'status' => 'available'],
            ['nama' => 'Scanner', 'kuantiti' => 1, 'status' => 'available'],
        ]);
    }
}
