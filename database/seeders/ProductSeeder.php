<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // PT Sierad Produce Tbk
            ['product_name' => 'Ayam Potong Fresh', 'description' => 'Ayam potong segar kualitas premium', 'unit_price' => 40000, 'stock' => 200, 'supplier_id' => 5, 'category_id' => 4, 'unit_id' => 1],
            ['product_name' => 'Nugget Ayam', 'description' => 'Nugget ayam siap saji', 'unit_price' => 50000, 'stock' => 150, 'supplier_id' => 5, 'category_id' => 4, 'unit_id' => 4],

            // Japfa Comfeed Indonesia Tbk
            ['product_name' => 'Pakan Ayam Starter', 'description' => 'Pakan ayam untuk masa awal pertumbuhan', 'unit_price' => 14000, 'stock' => 500, 'supplier_id' => 6, 'category_id' => 1, 'unit_id' => 1],
            ['product_name' => 'Pakan Ayam Finisher', 'description' => 'Pakan ayam untuk masa akhir pertumbuhan', 'unit_price' => 13000, 'stock' => 400, 'supplier_id' => 6, 'category_id' => 1, 'unit_id' => 1],
            ['product_name' => 'Konsetrat Layer Ayam Petelur KLK 36 SPR', 'description' => 'Pakan khusus yang diformulasikan untuk memenuhi nutrisi ayam petelur. ', 'unit_price' => 517000, 'stock' => 150, 'supplier_id' => 6, 'category_id' => 1, 'unit_id' => 11],

            // Charoen Pokphand Indonesia Tbk
            ['product_name' => 'Bibit Ayam Kampung', 'description' => 'Bibit ayam kampung berkualitas tinggi', 'unit_price' => 9000, 'stock' => 800, 'supplier_id' => 7, 'category_id' => 3, 'unit_id' => 4],
            ['product_name' => 'Ayam Potong Frozen', 'description' => 'Ayam potong beku untuk pasar modern', 'unit_price' => 45000, 'stock' => 300, 'supplier_id' => 7, 'category_id' => 4, 'unit_id' => 1],

            // Malindo Feedmill Tbk
            ['product_name' => 'Pakan Bebek', 'description' => 'Pakan khusus untuk bebek petelur', 'unit_price' => 18000, 'stock' => 250, 'supplier_id' => 8, 'category_id' => 1, 'unit_id' => 1],
            ['product_name' => 'Telur Bebek Organik', 'description' => 'Telur bebek organik dari peternakan alami', 'unit_price' => 40000, 'stock' => 150, 'supplier_id' => 8, 'category_id' => 4, 'unit_id' => 1],

            // PT Widodo Makmur Perkasa Tbk
            ['product_name' => 'Kandang Closed House', 'description' => 'Kandang ayam modern dengan ventilasi otomatis', 'unit_price' => 3000000, 'stock' => 20, 'supplier_id' => 9, 'category_id' => 5, 'unit_id' => 2],
            ['product_name' => 'Peralatan Pemanas Kandang', 'description' => 'Pemanas kandang untuk peternakan modern', 'unit_price' => 200000, 'stock' => 30, 'supplier_id' => 9, 'category_id' => 2, 'unit_id' => 2],

            // PT Anugerah Cita Tani Indonesia
            ['product_name' => 'Nipple Drinker Premium', 'description' => 'Peralatan minum ayam premium', 'unit_price' => 60000, 'stock' => 120, 'supplier_id' => 10, 'category_id' => 2, 'unit_id' => 2],
            ['product_name' => 'Blower Ventilasi', 'description' => 'Blower untuk menjaga sirkulasi udara di kandang', 'unit_price' => 160000, 'stock' => 40, 'supplier_id' => 10, 'category_id' => 5, 'unit_id' => 2],

            ['product_name' => 'Vitamin Ayam Bio', 'description' => 'Vitamin ayam untuk meningkatkan imunitas', 'unit_price' => 5000, 'stock' => 200, 'supplier_id' => 1, 'category_id' => 6, 'unit_id' => 8],
            ['product_name' => 'Obat Flu Ayam', 'description' => 'Obat flu untuk ayam ternak', 'unit_price' => 12000, 'stock' => 150, 'supplier_id' => 1, 'category_id' => 6, 'unit_id' => 8],

            // Agriculture by Argo Manunggal Group
            ['product_name' => 'Sistem Pemanas Kandang', 'description' => 'Pemanas otomatis untuk kandang ayam', 'unit_price' => 1000000, 'stock' => 20, 'supplier_id' => 2, 'category_id' => 7, 'unit_id' => 2],
            ['product_name' => 'Sistem Ventilasi Otomatis', 'description' => 'Ventilasi otomatis untuk kandang modern', 'unit_price' => 1500000, 'stock' => 15, 'supplier_id' => 2, 'category_id' => 7, 'unit_id' => 2],

            // Indoguna
            ['product_name' => 'Ayam Organik Frozen', 'description' => 'Ayam organik beku siap masak', 'unit_price' => 60000, 'stock' => 100, 'supplier_id' => 3, 'category_id' => 8, 'unit_id' => 1],
            ['product_name' => 'Telur Organik', 'description' => 'Telur ayam organik kaya nutrisi', 'unit_price' => 45000, 'stock' => 250, 'supplier_id' => 3, 'category_id' => 8, 'unit_id' => 1],

            // Berdikari Poultry
            ['product_name' => 'Aksesoris Tempat Makan', 'description' => 'Aksesoris untuk tempat makan ayam', 'unit_price' => 20000, 'stock' => 300, 'supplier_id' => 4, 'category_id' => 9, 'unit_id' => 2],
            ['product_name' => 'Lampu Kandang LED', 'description' => 'Lampu LED hemat energi untuk kandang', 'unit_price' => 50000, 'stock' => 100, 'supplier_id' => 4, 'category_id' => 9, 'unit_id' => 2],
        ];

        DB::table('products')->insert($products);
    }
}
