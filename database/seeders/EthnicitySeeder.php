<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EthnicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $ethnicities = [
            'Kikuyu',
            'Luhya',
            'Luo',
            'Kalenjin',
            'Kamba',
            'Kisii',
            'Meru',
            'Mijikenda',
            'Somali',
            'Maasai',
            'Turkana',
            'Teso',
            'Embu',
            'Taita',
            'Samburu',
            'Borana',
            'Gabra',
            'Rendille',
            'Pokot',
            'Swahili',
            'Other'
        ];

        foreach ($ethnicities as $ethnicity) {
            DB::table('ethnicities')->insert([
                'name' => $ethnicity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
