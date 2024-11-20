<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\CustomerCountWidget;
use App\Filament\Widgets\MonthlySalesChartWidget;
use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\DailySalesChartWidget;
use App\Filament\Widgets\MonthlyEarningsWidget;
use App\Filament\Widgets\TotalProductWidget;

class Dashboard extends BaseDashboard
{

    protected function getHeaderWidgets(): array {
        return [
            // MonthlyEarningsWidget::class,
            // TotalProductWidget::class,
            // CustomerCountWidget::class,
        ];
    }

    public function getColumns(): int | string | array
    {
        return 12;
    }

    // protected int | string | array $columnSpan = 'full';
}
