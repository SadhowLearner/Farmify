<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected static ?string $title = 'Isi Informasi Pembelian';

    protected function getRedirectUrl(): string
    {
        $orderNumber = $this->record->order_number;
        $orderId = $this->record->id;
        return route(
            'filament.admin.resources.invoices.create',
            [
                'order_number' => $orderNumber,
                'order_id' => $orderId,
            ]

        );
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('create')
                ->label('Selanjutnya')
                ->submit('create')
                ->keyBindings(['mod+s']),
        ];
    }
}
