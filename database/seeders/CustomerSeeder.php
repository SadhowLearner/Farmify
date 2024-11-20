<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customers = [
            [
                'customer_name' => 'Andi Saputra',
                'email' => 'andi.saputra@example.com',
                'phone' => '081234567890',
                'address' => 'Jl. Merpati No. 23, Jakarta Selatan',
            ],
            [
                'customer_name' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'phone' => '081223344556',
                'address' => 'Jl. Anggrek No. 45, Bandung',
            ],
            [
                'customer_name' => 'Citra Amelia',
                'email' => 'citra.amelia@example.com',
                'phone' => '081345678901',
                'address' => 'Jl. Cendrawasih No. 12, Surabaya',
            ],
            [
                'customer_name' => 'Dewi Kartika',
                'email' => 'dewi.kartika@example.com',
                'phone' => '081234987654',
                'address' => 'Jl. Melati No. 67, Semarang',
            ],
            [
                'customer_name' => 'Eko Purnomo',
                'email' => 'eko.purnomo@example.com',
                'phone' => '081298765432',
                'address' => 'Jl. Kenanga No. 89, Yogyakarta',
            ],
            [
                'customer_name' => 'Fahmi Rizal',
                'email' => 'fahmi.rizal@example.com',
                'phone' => '081334455667',
                'address' => 'Jl. Mawar No. 34, Malang',
            ],
            [
                'customer_name' => 'Gita Ayu',
                'email' => 'gita.ayu@example.com',
                'phone' => '081255667788',
                'address' => 'Jl. Dahlia No. 78, Medan',
            ],
            [
                'customer_name' => 'Hendra Wijaya',
                'email' => 'hendra.wijaya@example.com',
                'phone' => '081276543210',
                'address' => 'Jl. Seroja No. 56, Palembang',
            ],
            [
                'customer_name' => 'Ika Wulandari',
                'email' => 'ika.wulandari@example.com',
                'phone' => '081399887766',
                'address' => 'Jl. Sakura No. 101, Denpasar',
            ],
            [
                'customer_name' => 'Joko Prasetyo',
                'email' => 'joko.prasetyo@example.com',
                'phone' => '081244556677',
                'address' => 'Jl. Kamboja No. 88, Makassar',
            ],
        ];

        DB::table('customers')->insert($customers);
    }
}
