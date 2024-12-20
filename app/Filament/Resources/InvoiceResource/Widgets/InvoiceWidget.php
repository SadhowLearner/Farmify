<?php

namespace App\Filament\Resources\InvoiceResource\Widgets;

use Filament\Tables;
use App\Models\Order;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Actions\Action;
use Filament\Actions\Action as BaseAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\Summarizers\Summarizer;

class InvoiceWidget extends BaseWidget
{

    public $orderId;

    protected static ?string $heading = 'Detail Transaksi';

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
                TextColumn::make('order_number')->label('Nomor Pesanan')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('product.product_name')->label('Nama Barang')->alignCenter(),
                TextColumn::make('qty')->label('Jumlah Barang')->alignCenter(),
                TextColumn::make('product.unit.unit_name')->label('Satuan')->alignCenter(),
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
                        TextInput::make('qty')->required()->label('Jumlah Barang'),
                    ]),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Action::make('print')
                    ->label('Print')
                    ->icon('heroicon-o-printer')
                    ->url(fn() => route('invoices.print', ['order_id' => $this->orderId]))
                    ->openUrlInNewTab()
                    ->action(fn () => redirect()->route('orders.create'))
                    ->color('primary'), // Menentukan warna tombol
            ]);
    }

    protected function updateOrderTotal($total)
    {
        // Cari Order berdasarkan order_number dan update total_amount
        Order::where('id', $this->orderId)->update(['total' => $total]);
    }
}
