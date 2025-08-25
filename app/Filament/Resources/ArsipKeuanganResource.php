<?php

namespace App\Filament\Resources;

use App\Models\ArsipKeuangan;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\Select;
use App\Filament\Resources\ArsipKeuanganResource\Pages;


class ArsipKeuanganResource extends Resource
{
    protected static ?string $model = ArsipKeuangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Arsip Keuangan';
    protected static ?string $navigationGroup = 'Manajemen Arsip Keuangan';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('judul')
                ->label('Judul Arsip')
                ->placeholder('Ketikan judul arsip...')
                ->required()
                ->maxLength(255),

            TextInput::make('nomor_arsip')
                ->label('Nomor Arsip')
                ->placeholder('Ketikan nomor arsip...')
                ->required()
                ->maxLength(100),

            Select::make('kategori')
                ->label('Kategori')
                ->options([
                    'SPP' => 'SPP',
                    'Dana BOS' => 'Dana BOS',
                    'Operasional' => 'Operasional',
                    'Lainnya' => 'Lainnya',
                ])
                ->required(),

            DatePicker::make('tanggal')
                ->label('Tanggal Dokumen')
                ->required(),

            FileUpload::make('file_path')
                ->label('File Dokumen')
                ->directory('arsip-keuangan')
                ->preserveFilenames()
                ->downloadable()
                ->required(),

            Textarea::make('keterangan')
                ->label('Keterangan Tambahan')
                ->placeholder('Ketikan keterangan tambahan...')
                ->rows(3)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('judul')->searchable()->label('Judul')->sortable(),
            TextColumn::make('nomor_arsip')->label('Nomor Arsip')->color('info')->sortable(),
            TextColumn::make('kategori')->label('Kategori')->sortable(),
            TextColumn::make('tanggal')
                ->label('Tanggal')
                ->date('d M Y'),
            TextColumn::make('file_path')
                ->label('File')
                ->formatStateUsing(fn (string $state) => basename($state)),
        ])->defaultSort('tanggal', 'desc')
        
        ->filters([
            //
        ])
        ->actionsColumnLabel('Aksi')
        ->actions([
            Tables\Actions\EditAction::make()
                ->label('Ubah')
                ->icon('heroicon-o-pencil-square')
                ->color('warning')
                ->tooltip('Ubah Arsip'),
            Tables\Actions\ViewAction::make()
                ->label('Lihat')
                ->icon('heroicon-o-eye')
                ->color('info')
                ->tooltip('Lihat Arsip'),
            Tables\Actions\DeleteAction::make()
                ->label('Hapus')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->tooltip('Hapus Arsip'),
            
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
            'index' => Pages\ListArsipKeuangans::route('/'),
            'create' => Pages\CreateArsipKeuangan::route('/create'),
            'edit' => Pages\EditArsipKeuangan::route('/{record}/edit'),
        ];
    }
}