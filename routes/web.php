<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Arr;

class ProductSample {
    public static function all() {
        return [
                [
                    'name' => 'Daging Sapi',
                    'id' => 'apa-penyebab-kita-mengantuk',
                    'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, quae!',
                    'price' => 23000,
                    'stock' => 10,
                    'img' => 'meat.jpg',
                ],
                [
                    'name' => 'Telur',
                    'id' => 'cara-tidur',
                    'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, quae!',
                    'price' =>  23000,
                    'stock' => 10,
                    'img' => 'egg-product.jpg',
                ]
            ];
    } 
}

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', function () {
    return view('dashboard', ['products' => ProductSample::all()]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Controller

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Product Controller

Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.show-products');

require __DIR__.'/auth.php';
