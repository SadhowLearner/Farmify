<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Illuminate\Support\Facades\DB;

class MonthlyEarningsWidget extends BaseWidget
{

    protected static ?int $sort = 1;
    // protected int | string | array $columnSpan = 4;


    protected function getstats(): array
    {
        $customerCount = \App\Models\Customer::count();

        $productCount = \App\Models\Product::count();
        // Hitung total penghasilan bulan ini
        $totalEarnings = DB::table('orders')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total'); // Ganti 'total_price' dengan kolom yang sesuai

        return [
            Stat::make('Total Penjualan Bulan Ini', 'Rp ' . number_format($totalEarnings, 0, ',', '.'))
                ->color('success'),
            Stat::make('Jumlah Produk', $productCount)
                ->description('Total produk yang tersedia')
                ->icon('heroicon-o-archive-box')
                ->color('success'),
            Stat::make('Jumlah Pelanggan', $customerCount)
                ->description('Total pelanggan yang terdaftar')
                ->icon('heroicon-o-users')
                ->color('primary'),  // Warna hijau
        ];
    }
}
