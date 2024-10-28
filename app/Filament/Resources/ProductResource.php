<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $activeNavigationIcon = 'heroicon-s-cube';

    protected static ?string $label = 'Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('supplier_id')
                    ->label('Pemasok')
                    ->required()
                    ->options(
                        \App\Models\Supplier::all()->pluck('supplier_name', 'id')
                    )->searchable()
                    ->createOptionForm(
                        \App\Filament\Resources\SupplierResource::getForm()
                    )->createOptionUsing(function (array $data): int {
                        return \App\Models\Supplier::create($data)->id;
                    }),
                Forms\Components\TextInput::make('product_name')
                    ->label('Nama Barang')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('unit_price')->label('Harga')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('stock')->label('Stok')
                    ->required()
                    ->disabledOn('edit')
                    ->numeric(),
                Forms\Components\Select::make('category_id')
                    ->label('Kategori Barang')
                    ->required()
                    ->options(
                        \App\Models\Category::all()->pluck('category_name', 'id')
                    )->searchable()
                    ->createOptionForm(
                        \App\Filament\Resources\CategoryResource::getForm()
                    )
                    ->createOptionUsing(function (array $data): int {
                        return \App\Models\Category::create($data)->id;
                    }),
                Forms\Components\Select::make('unit_id')
                    ->label('Satuan Barang')
                    ->required()
                    ->options(
                        \App\Models\Unit::all()->pluck('unit_name', 'id')
                    )->searchable()
                    ->createOptionForm(
                        \App\Filament\Resources\UnitResource::getForm()
                    )->createOptionUsing(function (array $data): int {
                        return \App\Models\Unit::create($data)->id;
                    }),
                Forms\Components\TextArea::make('description')->label('Deskripsi')
                    ->maxLength(255)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('product_name')
                    ->label('Nama Barang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit_price')
                    ->label('Harga')
                    ->numeric()
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->label('Stok')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unit')
                    ->label('Satuan Unit'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
