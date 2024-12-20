<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\InvoiceResource;
use App\Filament\Resources\InvoiceResource\Widgets\InvoiceWidget;

class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;

    public function getFooterWidgetsColumns(): int | array
    {
        return 1;
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('create')
                ->label('Tambah')
                ->submit('create')
                ->keyBindings(['mod+s'])
                ->outlined(),
            Action::make('newOrder')
                ->label('Buat Order Baru')
                ->color('success') // Warna hijau untuk membedakan
                ->action(fn() => redirect()->route('filament.admin.resources.orders.create')) // Arahkan ke halaman Buat Order Baru
                ->icon('heroicon-o-plus'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        $order_number = $this->record->order_number;
        $orderId = $this->record->order_id;
        return route(
            'filament.admin.resources.invoices.create',
            [
                'order_number' => $order_number,
                'order_id' => $orderId,
            ]

        );
    }

    protected function getFooterWidgets(): array
    {
        return [
            InvoiceWidget::make(
                [
                    'record' => request('order_id'),
                ]
            ),
        ];
    }
}
