<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $religions = [
            'Christianity',
            'Islam',
            'Hinduism',
            'Buddhism',
            'Other'
        ];

        foreach ($religions as $religion) {
            DB::table('religions')->insert([
                'name' => $religion,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
