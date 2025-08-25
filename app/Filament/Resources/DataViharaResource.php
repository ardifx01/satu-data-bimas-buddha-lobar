<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataViharaResource\Pages;
use App\Models\DataVihara;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;

class DataViharaResource extends Resource
{
    protected static ?string $model = DataVihara::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $navigationGroup = "Kumpulan Arsip";

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Vihara')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('nama_vihara')
                                ->label('Nama Vihara')
                                ->placeholder('Ketikan nama vihara...')
                                ->required(),

                            TextInput::make('alamat')
                                ->label('Alamat')
                                ->placeholder('Ketikan nama alamat...')
                                ->required(),

                            TextInput::make('kota')
                                ->label('Kota/Kabupaten')
                                ->placeholder('Ketikan nama kota atau kabupaten...')
                                ->required(),

                            TextInput::make('provinsi')
                                ->label('Provinsi')
                                ->placeholder('Ketikan nama provinsi...')
                                ->required(),

                            TextInput::make('nama_ketua_vihara')
                                ->label('Nama Ketua Vihara')
                                ->placeholder('Ketikan nama ketua vihara...')
                                ->required(),

                            TextInput::make('kontak')
                                ->label('Kontak')
                                ->placeholder('Ketikan nomor handphone...')
                                ->required(),
                            
                            Select::make('status_tanda_daftar')
                                ->label('Status Tanda Daftar')
                                ->options([
                                    'Terdaftar' => 'Terdaftar',
                                    'Belum Terdaftar' => 'Belum Terdaftar',
                                    'Perpanjangan' => 'Perpanjangan',
                                ])
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
                Tables\Columns\TextColumn::make('nama_vihara')->searchable(),
                Tables\Columns\TextColumn::make('alamat')->limit(20),
                Tables\Columns\TextColumn::make('kota'),
                Tables\Columns\TextColumn::make('provinsi'),
                Tables\Columns\TextColumn::make('nama_ketua_vihara')->label('Ketua'),
                Tables\Columns\TextColumn::make('kontak')->label('Kontak'),
                Tables\Columns\TextColumn::make('status_tanda_daftar')->label('Status'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataViharas::route('/'),
            'create' => Pages\CreateDataVihara::route('/create'),
            'edit' => Pages\EditDataVihara::route('/{record}/edit'),
        ];
    }
}