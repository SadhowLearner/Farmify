<?php

namespace App\Filament\Resources\InvoiceResource\Widgets;

use Filament\Tables;
use App\Models\Order;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\Summarizers\Summarizer;

class InvoiceWidget extends BaseWidget
{

    public $orderId;

    public function mount($record)
    {
        $this->orderId = $record;
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(
                \App\Models\Invoice::query()->where('order_id', $this->orderId),
            )
            ->columns([
                TextColumn::make('order_number')->label('Nomor Pesanan'),
                TextColumn::make('product.product_name')->label('Nama Barang')->alignCenter(),
                TextColumn::make('qty')->label('Jumlah Barang')->alignCenter(),
                TextColumn::make('price')->label('Harga Barang')->money('idr', true)->alignCenter(),
                TextColumn::make('subtotal')->label('Subtotal')->money('idr', true)->alignEnd()
                    ->summarize(
                        Summarizer::make()
                            ->using(function ($query) {
                                $total = $query->sum(DB::raw('qty * price'));
                                // Panggil metode untuk update total_amount di orders
                                $this->updateOrderTotal($total);
                                return $total;
                            })->money('idr'),
                    ),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->form([
                        TextInput::make('qty')->required()
                    ]),
                Tables\Actions\DeleteAction::make(),
                Action::make('print')
                    ->label('Print')
                    ->url(fn () => route('invoice.print', ['order_id' => $this->orderId]))
                    ->openUrlInNewTab(),
            ]);
    }

    protected function updateOrderTotal($total)
    {
        // Cari Order berdasarkan order_number dan update total_amount
        Order::where('id', $this->orderId)->update(['total' => $total]);
    }
}
