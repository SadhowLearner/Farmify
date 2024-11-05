<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Product::create([
            'product_name' => 'pakan sapil',
            'description' => 'lorem ipsum delar sit atmet',
            'unit_price' => 10000,
            'stock' => 12,
            'supplier_id' => 1,
            'category_id' => 1,
            'unit_id' => 1,
        ]);
        Supplier::create([
            'supplier_name' => 'Supllier1',
        ]);
        Category::create([
            'category_name' => 'Pakan',
        ]);
        Unit::create([
            'unit_name' => 'Lusin',
        ]);

    }
}
