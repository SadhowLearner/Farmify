<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use App\Models\Invoice;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InvoiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InvoiceResource\RelationManagers;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $label = 'Detail Pesanan';

    public static function form(Form $form): Form
    {
        if (request()->filled('order_number')) {
            $order = request('order_number');
        }
        $orderId = request('order_id');
        return $form
            ->schema([
                Hidden::make('order_id')->required()
                    ->default($orderId),
                // TextInput::make('customer.customer_name')
                //     ->label('Nomor Pesanan')
                //     ->readonly()
                //     ->required()
                //     ->columnSpanFull(),
                TextInput::make('order_number')
                    ->label('Nomor Pesanan')
                    ->default($order ?? 'Belum ada pesanan')
                    ->readonly()
                    ->required()
                    ->columnSpanFull(),
                Grid::make()
                    ->schema([
                        Select::make('product_id')
                            ->relationship('product', 'product_name')
                            ->reactive()
                            ->label('Nama Barang')
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                $barang = \App\Models\Product::find($state);
                                $set('price', $barang->unit_price ?? 'Harga Tidak Ditemukan');
                                $set('unit', $barang->unit->unit_name ?? 'Satuan Tidak Ditemukan');
                                $set('subtotal', ($get('price') ?? 0) * ($get('qty') ?? 0));
                            })
                            ->columnSpan(7)
                            ->required()
                            ->searchable(),
                        TextInput::make('unit')
                            ->label('Unit')
                            ->disabled()
                            ->reactive()
                            ->columnSpan(1),
                        TextInput::make('qty')
                            ->label('Kuantitas')
                            ->numeric()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                $set('subtotal', ($get('price') ?? 0) * ($state ?? 0));
                            })
                            ->columnSpan(4 ),
                    ])->columns(12),
                TextInput::make('price')
                    ->label('Harga Barang')
                    ->numeric()
                    ->required()
                    ->readonly()
                    ->reactive()
                    ->columnSpan(1)
                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                        $set('subtotal', ($get('qty') ?? 0) * ($state ?? 0));
                    }),
                TextInput::make('subtotal')
                    ->label('Subtotal')
                    ->numeric()
                    ->readonly() // Disable untuk mencegah input manual
                    ->reactive()
                    ->default(0) // Nilai default awal
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.product_name')->label('Item'),
                Tables\Columns\TextColumn::make('order_number')->label('Nomor Pesanan'),
                Tables\Columns\TextColumn::make('qty')->label('Jumlah Barang'),
                Tables\Columns\TextColumn::make('price')->money('idr', true)->label('Harga Barang'),
                Tables\Columns\TextColumn::make('subtotal')->money('idr', true),
            ])
            ->filters([
                SelectFilter::make('order_id')
                    ->label('Filter dari Order')
                    ->options(Order::all()->pluck('order_number', 'id'))
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('Detail'),
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
