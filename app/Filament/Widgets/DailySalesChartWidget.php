<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DailySalesChartWidget extends ChartWidget
{
    protected static ?int $sort = 4;
    protected static ?string $heading = 'Total Penjualan Harian (Minggu Ini)';

    public static function canView(): bool
    {
        return Auth::check() && Auth::user()->role == 'admin';
    }

    public int | string | array $columnSpan = 6;
    protected function getDayName(string $day): string
    {
        $days = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];

        return $days[$day];
    }
    protected function getData(): array
    {
        $sales = DB::table('orders')
            ->selectRaw('DAYNAME(created_at) as day, SUM(total) as total_sales') // Ambil total berdasarkan hari
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]) // Minggu ini
            ->groupBy('day')
            ->orderByRaw("FIELD(DAYNAME(created_at), 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')")
            ->get()
            ->mapWithKeys(fn($item) => [
                $this->getDayName($item->day) => $item->total_sales,
            ]);

        $labels = $sales->keys()->toArray(); // Hari dalam minggu ini
        $data = $sales->values()->toArray(); // Total penjualan

        return [
            'datasets' => [
                [
                    'label' => 'Total Penjualan Mingguan',
                    'data' => $data,
                    'borderColor' => '#4caf50',
                    'backgroundColor' => 'rgba(76, 175, 80, 1)',
                ],
            ],
            'labels' => $labels, // Nama hari sebagai label
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

    // Helper function untuk mendapatkan nama hari berdasarkan nomo

    protected function getType(): string
    {
        return 'bar';
    }
}
