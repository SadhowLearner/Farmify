<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['category_name' => 'Pakan Ternak'],
            ['category_name' => 'Alat Peternakan'],
            ['category_name' => 'Bibit Ayam'],
            ['category_name' => 'Produk Olahan Ayam'],
            ['category_name' => 'Kandang Modern'],
            ['category_name' => 'Vitamin dan Obat-obatan'], // Baru
            ['category_name' => 'Sistem Otomasi'],          // Baru
            ['category_name' => 'Produk Organik'],         // Baru
            ['category_name' => 'Aksesoris Kandang'],      // Baru
            ['category_name' => 'Peralatan Kebersihan'],   // Baru
        ];

        DB::table('categories')->insert($categories);
    }
}
