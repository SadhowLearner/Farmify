<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run()
    {
        $units = [
            ['unit_name' => 'Kilogram'],
            ['unit_name' => 'Unit'],
            ['unit_name' => 'Liter'],
            ['unit_name' => 'Paket'],
            ['unit_name' => 'Meter'],             // Baru
            ['unit_name' => 'Gram'],              // Baru
            ['unit_name' => 'Botol'],             // Baru
            ['unit_name' => 'Tablet'],            // Baru
            ['unit_name' => 'Kaleng'],            // Baru
            ['unit_name' => 'Box'],               // Baru
            ['unit_name' => 'Karung'],               // Baru
        ];

        DB::table('units')->insert($units);
    }
}
