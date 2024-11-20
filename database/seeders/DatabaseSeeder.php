<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        // Pemasok / Supplier Seeder
        $this->call(SupplierSeeder::class);
        // CategorySeeder
        $this->call(CategorySeeder::class);
        // Unit / Satuan
        $this->call(UnitSeeder::class);
        // Product / Barang
        $this->call(ProductSeeder::class);
        //Customer / Pelanggan
        $this->call(CustomerSeeder::class);
    }
}
