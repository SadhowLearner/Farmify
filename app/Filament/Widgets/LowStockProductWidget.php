<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Product;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LowStockProductWidget extends BaseWidget
{
    protected static ?int $sort = 8;
    protected static ?string $heading = 'Stok yang Hampir Habis';

    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
        ->query(
            Product::query()
                ->where('stock', '<=', 10) // Barang dengan stok ≤ 10
                ->orderBy('stock', 'asc') // Urutkan berdasarkan stok terkecil
        )
        ->columns([
            Tables\Columns\TextColumn::make('product_name')
                ->label('Nama Produk')
                ->sortable()
                ->searchable(), // Kolom nama produk dapat dicari dan diurutkan

            Tables\Columns\TextColumn::make('stock')
                ->label('Stok')
                ->sortable()
                ->color('danger') // Tampilkan warna merah untuk stok rendah
                ->formatStateUsing(fn($state) => number_format($state)), // Format angka
        ]);
    }
}
