<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BahagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample Data Bahagian
        // Menggunakan Query Builder
        // DB::connection('mysql')->table('bahagian')->insert([]);
        DB::table()->insert([
            ['nama' => 'Khidmat Pengurusan'],
            ['nama' => 'Perkhidmatan Pameran dan Konservasi'],
            ['nama' => 'Media dan Pembangunan Seni'],
        ]);
    }
}
