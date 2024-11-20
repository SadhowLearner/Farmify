<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'supplier_name' => 'Telur Emas Globalindo',
                'email' => null,
                'phone' => '0812-3456-7890',
                'address' => null,
                'company_name' => 'PT Telur Emas Globalindo',
            ],
            [
                'supplier_name' => 'Argo Manunggal',
                'email' => null,
                'phone' => '0813-9876-5432',
                'address' => null,
                'company_name' => 'Argo Manunggal Group',
            ],
            [
                'supplier_name' => 'Indoguna',
                'email' => null,
                'phone' => '0814-5678-9012',
                'address' => null,
                'company_name' => 'Indoguna Indonesia',
            ],
            [
                'supplier_name' => 'Berdikari',
                'email' => null,
                'phone' => '0815-1234-5678',
                'address' => null,
                'company_name' => 'Berdikari Poultry',
            ],
            [
                'supplier_name' => 'Sierad Produce',
                'email' => null,
                'phone' => '0816-2345-6789',
                'address' => null,
                'company_name' => 'PT Sierad Produce Tbk',
            ],
            [
                'supplier_name' => 'Japfa Comfeed',
                'email' => null,
                'phone' => '0817-3456-7890',
                'address' => null,
                'company_name' => 'Japfa Comfeed Indonesia Tbk',
            ],
            [
                'supplier_name' => 'Charoen Pokphand',
                'email' => null,
                'phone' => '0818-4567-8901',
                'address' => null,
                'company_name' => 'Charoen Pokphand Indonesia Tbk',
            ],
            [
                'supplier_name' => 'Malindo Feedmill',
                'email' => null,
                'phone' => '0819-5678-9012',
                'address' => null,
                'company_name' => 'Malindo Feedmill Tbk',
            ],
            [
                'supplier_name' => 'Widodo Makmur Perkasa ',
                'email' => null,
                'phone' => '0820-6789-0123',
                'address' => null,
                'company_name' => 'PT Widodo Makmur Perkasa Tbk',
            ],
            [
                'supplier_name' => 'Anugerah Cita Tani',
                'email' => null,
                'phone' => '0821-7890-1234',
                'address' => null,
                'company_name' => 'PT Anugerah Cita Tani Indonesia',
            ],
        ];
        
        DB::table('suppliers')->insert($suppliers);
    }
}
