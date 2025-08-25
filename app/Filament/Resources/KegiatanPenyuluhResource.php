<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanPenyuluhResource\Pages;
use App\Models\KegiatanPenyuluh;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class KegiatanPenyuluhResource extends Resource
{
    protected static ?string $model = KegiatanPenyuluh::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'Manajemen Kegiatan';
    protected static ?int $navigationSort = 1;
    protected static ?string $label = 'Kegiatan Penyuluh';
    protected static ?string $pluralLabel = 'Kegiatan Penyuluh';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('user_id')
                ->label('Penyuluh')
                ->options(User::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),

            TextInput::make('judul')
                ->label('Judul Kegiatan')
                ->required(),

            Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(4)
                ->nullable(),

            DatePicker::make('tanggal_kegiatan')
                ->label('Tanggal Kegiatan')
                ->required(),

            TextInput::make('lokasi')
                ->label('Lokasi')
                ->nullable(),

            FileUpload::make('dokumentasi')
                ->label('Dokumentasi')
                ->directory('kegiatan/dokumentasi')
                ->disk('public')
                ->image()
                ->multiple()
                ->reorderable()
                ->nullable(),

            Select::make('status')
                ->label('Status')
                ->options([
                    'menunggu' => 'Menunggu',
                    'disetujui' => 'Disetujui',
                    'ditolak' => 'Ditolak',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Penyuluh')
                    ->sortable(),
                TextColumn::make('tanggal_kegiatan')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'primary' => 'menunggu',
                        'success' => 'disetujui',
                        'danger' => 'ditolak',
                    ])
                    ->formatStateUsing(fn($state) => ucfirst($state))
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
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatanPenyuluhs::route('/'),
            'create' => Pages\CreateKegiatanPenyuluh::route('/create'),
            'edit' => Pages\EditKegiatanPenyuluh::route('/{record}/edit'),
        ];
    }
}