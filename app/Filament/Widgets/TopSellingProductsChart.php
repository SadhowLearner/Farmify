<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TopSellingProductsChart extends ChartWidget
{

    public static function canView(): bool
    {
        return Auth::check() && Auth::user()->role == 'admin';
    }
    protected static ?string $heading = 'Grafik Produk Terlaris';

    // Atur urutan widget
    protected static ?int $sort = 5;

    // Atur ukuran kolom widget (opsional)
    public int | string | array $columnSpan = 6;

    protected function getData(): array
    {
        // Ambil data produk terlaris dari database
        $topProducts = DB::table('invoices')
            ->join('products', 'invoices.product_id', '=', 'products.id')
            ->select('products.product_name as product_name', DB::raw('SUM(invoices.qty) as total_sold'))
            ->groupBy('product_name')
            ->orderBy('total_sold', 'DESC')
            ->limit(5) // Batasi hanya 5 produk teratas
            ->get();

        // Map data untuk digunakan di chart
        $labels = $topProducts->pluck('product_name')->toArray();
        $data = $topProducts->pluck('total_sold')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Terjual',
                    'data' => $data,
                    'backgroundColor' => [
                        'rgba(93, 173, 226, 1)',   // Cerulean Blue
                        'rgba(125, 206, 160, 1)', // Mint Green
                        'rgba(244, 208, 63, 1)',  // Yellow Pastel
                        'rgba(231, 76, 60, 1)',   // Coral Red
                        'rgba(155, 89, 182, 1)',  // Amethyst Purple
                        'rgba(41, 128, 185, 1)',  // Strong Blue
                    ] ,   // Oranye
                    'borderColor' => [
                        'rgba(93, 173, 226, 1)',   // Cerulean Blue
                        'rgba(125, 206, 160, 1)', // Mint Green
                        'rgba(244, 208, 63, 1)',  // Yellow Pastel
                        'rgba(231, 76, 60, 1)',   // Coral Red
                        'rgba(155, 89, 182, 1)',  // Amethyst Purple
                        'rgba(41, 128, 185, 1)',  // Strong Blue
                    ],    // Oranye
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }


    protected function getType(): string
    {
        return 'doughnut';
    }
}
