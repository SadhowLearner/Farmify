<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MonthlySalesChartWidget extends ChartWidget
{

    protected static ?int $sort = 7;

    public static function canView(): bool
    {
        return Auth::check() && Auth::user()->role == 'admin';
    }

    protected static ?string $heading = 'Total Penjualan Per Bulan';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $sales = DB::table('orders')
            ->selectRaw('MONTH(created_at) as month, SUM(total) as total_sales')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->mapWithKeys(fn ($item) => [
                date('F', mktime(0, 0, 0, $item->month, 1)) => $item->total_sales
            ]);
    
        $labels = $sales->keys()->toArray();
        $data = $sales->values()->toArray();
    
        return [
            'datasets' => [
                [
                    'label' => 'Total Penjualan',
                    'data' => $data,
                    'borderColor' => '#4caf50',
                    'backgroundColor' => 'rgba(76, 175, 80, 1)',
                ],
            ],
            'labels' => $labels,
            'options' => [
                'scales' => [
                    'y' => [
                        'ticks' => [
                            'callback' => 'function(value) { return value.toLocaleString("id-ID"); }',
                        ],
                    ],
                ],
            ],
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}
