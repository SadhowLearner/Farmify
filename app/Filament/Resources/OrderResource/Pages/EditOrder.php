<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

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

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
