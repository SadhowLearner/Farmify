<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('avatar_url')->avatar()->label('Avatar'),
                Forms\Components\TextInput::make('name')->label('Nama')
                    ->required(),
                Forms\Components\TextInput::make('email')->label('E-Mail')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required(),
                Forms\Components\TextInput::make('password')->label('Kata Sandi')
                    ->revealable()
                    ->password()
                    ->dehydrateStateUsing(fn(string $state): string => Hash::make($state))
                    ->dehydrated(fn(?string $state): bool => filled($state))
                    ->required(fn(string $operation): bool => $operation === 'create'),

                Forms\Components\Select::make('role')->label('Peran')
                    ->options([
                        'cashier' => 'Kasir',
                        'admin' => 'Admin',
                    ])
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar_url')->circular()
                    ->label('Avatar'),
                Tables\Columns\Textcolumn::make('id')->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')->label('Peran'),
                Tables\Columns\TextColumn::make('email')->searchable()->label('E-mail'),
                Tables\Columns\TextColumn::make('created_at')->sortable()->label('waktu Bergabung'),

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
