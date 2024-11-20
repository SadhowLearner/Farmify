<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class LastOrders extends BaseWidget
{

    protected static ?string $heading = 'Order Terbaru';

    // Urutan tampilan di dashboard
    protected static ?int $sort = 6;

    // Ukuran kolom (opsional)
    public int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                \App\Models\Order::query()
            )
            ->columns([
                TextColumn::make('order_number')->label('Nomor'),
                TextColumn::make('customer.customer_name')->label('Nama'),
                TextColumn::make('order_date')->label('Waktu'),
                TextColumn::make('total')->label('Total')->money('idr'),
            ]);
    }
}
