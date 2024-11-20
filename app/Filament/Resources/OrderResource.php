<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use App\Models\Customer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Widgets\Widget;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $activeNavigationIcon = 'heroicon-s-credit-card';

    protected static ?string $label = 'Data Pesanan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('cashier_id')
                    ->default(Auth::id())
                    ->required(),
                Forms\Components\DateTimePicker::make('order_date')
                    ->required()
                    ->label('Tanggal Pemesanan')
                    // ->disabled()
                    ->native(false)
                    ->prefix('Waktu Pemesanan')
                    ->closeOnDateSelection()
                    ->default(now())
                    ->readonly(),
                Forms\Components\TextInput::make('order_number')
                    ->unique()
                    ->label('Nomor Pesanan')
                    ->readonly()
                    ->default(fn() => 'ORD-' . now()->format('Ymd') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT))
                    ->required(),
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'customer_name')
                    ->searchable()
                    ->reactive()
                    ->label('Pelanggan')
                    ->createOptionForm(
                        \App\Filament\Resources\CustomerResource::getForm()
                    )
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('total')
                    ->numeric()
                    ->label('Total Pesanan')
                    ->readonly()
                    ->hidden(),
                // Forms\Components\Select::make('product_id')
                //     ->required()
                //     ->options(
                //         \App\Models\Product::all()->pluck('product_name', 'id')
                //     )->searchable()
                //     ->label('Pilih Barang'),
                // Forms\Components\TextInput::make('qty')
                //     ->label('Jumlah ')
                //     ->required()
                //     ->numeric(),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.customer_name')->label('Pelanggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order_number')->searchable()->label('Nomor Pesanan'),
                Tables\Columns\TextColumn::make('total')->money('IDR', true),
                Tables\Columns\TextColumn::make('order_date')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Tanggal Pesanan')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('Detail'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            // 'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
