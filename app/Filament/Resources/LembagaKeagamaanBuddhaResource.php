<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LembagaKeagamaanBuddhaResource\Pages;
use App\Filament\Resources\LembagaKeagamaanBuddhaResource\RelationManagers;
use App\Models\LembagaKeagamaanBuddha;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LembagaKeagamaanBuddhaResource extends Resource
{
    protected static ?string $model = LembagaKeagamaanBuddha::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $navigationGroup = "Data Lembaga";

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Lembaga Agama Buddha')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('nama_lembaga')
                                ->label('Nama Lembaga...')
                                ->placeholder('Ketikan nama lembaga...')
                                ->required(),

                            TextInput::make('alamat')
                                ->label('Alamat')
                                ->placeholder('Ketikan alamat...')
                                ->required(),

                            TextInput::make('kota')
                                ->label('Kota/Kabupaten')
                                ->placeholder('Ketikan nama kota atau kabupaten...')
                                ->required(),

                            TextInput::make('provinsi')
                                ->label('Provinsi')
                                ->placeholder('Ketikan nama provinsi...')
                                ->required(),

                            TextInput::make('nama_ketua_lembaga')
                                ->label('Nama Ketua Lembaga')
                                ->placeholder('Ketikan nama ketua lembaga...')
                                ->required(),

                            TextInput::make('kontak')
                                ->label('Kontak')
                                ->placeholder('Ketikan nomor handphone...')
                                ->required(),
                        ]),
                    ])
                    ->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('nama_lembaga')->searchable(),
                Tables\Columns\TextColumn::make('alamat')->limit(20),
                Tables\Columns\TextColumn::make('kota'),
                Tables\Columns\TextColumn::make('provinsi'),
                Tables\Columns\TextColumn::make('nama_ketua_lembaga')->label('Ketua'),
                Tables\Columns\TextColumn::make('kontak')->label('Kontak'),
                Tables\Columns\TextColumn::make('created_at')->date('d M Y'),
            ])
            ->filters([
                //
            ])
            ->actionsColumnLabel('Aksi')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLembagaKeagamaanBuddhas::route('/'),
            'create' => Pages\CreateLembagaKeagamaanBuddha::route('/create'),
            'edit' => Pages\EditLembagaKeagamaanBuddha::route('/{record}/edit'),
        ];
    }
}