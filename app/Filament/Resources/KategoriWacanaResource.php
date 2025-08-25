<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriWacanaResource\Pages;
use App\Models\KategoriWacana;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class KategoriWacanaResource extends Resource
{
    protected static ?string $model = KategoriWacana::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';
    protected static ?string $navigationLabel = 'Kategori Wacana';
    protected static ?string $navigationGroup = 'Wacana';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Kategori')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            // bisa ditambahkan RelationManager jika ingin relasi ke PostWacana
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriWacanas::route('/'),
            'create' => Pages\CreateKategoriWacana::route('/create'),
            'edit' => Pages\EditKategoriWacana::route('/{record}/edit'),
        ];
    }
}