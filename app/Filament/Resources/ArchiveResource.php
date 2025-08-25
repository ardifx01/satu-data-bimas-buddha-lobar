<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArchiveResource\Pages;
use App\Models\Archive;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Get;
use Filament\Tables\Columns\TextColumn;

class ArchiveResource extends Resource
{
    protected static ?string $model = Archive::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box-arrow-down';

    protected static ?string $navigationGroup = "Kumpulan Arsip";

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('category_id')
                                ->relationship('category', 'nama_kategori')
                                ->label('Kategori')
                                ->required(),

                            Select::make('jenis')
                                ->label('Jenis Arsip')
                                ->options([
                                    'surat_masuk' => 'Surat Masuk',
                                    'surat_keluar' => 'Surat Keluar',
                                    'laporan_keuangan' => 'Laporan Keuangan',
                                ])
                                ->required(),

                            TextInput::make('title')
                                ->label('Judul')
                                ->placeholder('Ketikan judul...')
                                ->required(),

                            TextInput::make('no_surat')
                                ->label('No Surat')
                                ->placeholder('Ketikan no surat...')
                                ->required(),

                            DatePicker::make('tgl')
                                ->label('Tanggal')
                                ->required(),

                            TextInput::make('pengirim')
                                ->label('Pengirim')
                                ->placeholder('Ketikan pengirim...')
                                ->required(),

                            TextInput::make('penerima')
                                ->label('Penerima')
                                ->placeholder('Ketikan nama penerima...')
                                ->required(),

                            FileUpload::make('file_path')
                                ->label('Upload File')
                                ->directory('surat') // storage/app/public/surat
                                ->downloadable()
                                ->openable()
                                ->preserveFilenames(),
                        ]),

                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('Ketikan deskripsi...')
                            ->rows(3)
                            ->columnSpanFull(),
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
                    
                Tables\Columns\TextColumn::make('category.nama_kategori')
                    ->label('Kategori')->searchable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')->searchable(),

                Tables\Columns\TextColumn::make('no_surat')
                    ->label('No Surat')->searchable(),

                Tables\Columns\TextColumn::make('jenis')
                    ->label('Jenis')->searchable(),

                Tables\Columns\TextColumn::make('tgl')
                    ->label('Tanggal')
                    ->date('d M Y')->searchable(),

                Tables\Columns\TextColumn::make('pengirim')->searchable(),

                Tables\Columns\TextColumn::make('penerima')->searchable(),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(30),

                Tables\Columns\TextColumn::make('file_path')
                    ->label('File')
                    ->url(fn ($record) => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab()
                    ->limit(25),
                TextColumn::make('file_path')
                    ->label('Dokumen')
                    ->formatStateUsing(fn ($state) => $state ? 'View Dokumen' : '-')
                    ->url(fn ($record) => $record->file_path ? asset('storage/' . $record->file_path) : null, true)
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-document-arrow-down'), // opsional ikon

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->date('d F Y')
                    ->timezone('Asia/Jakarta'),
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
                    ->tooltip('Hapus Arsip')
                    ->requiresConfirmation()
                    ->modalHeading('Hapus Arsip')
                    ->modalDescription('Apakah anda yakin menghapus data ini?')
                    ->modalSubmitActionLabel('Hapus')
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
            'index' => Pages\ListArchives::route('/'),
            'create' => Pages\CreateArchive::route('/create'),
            'edit' => Pages\EditArchive::route('/{record}/edit'),
        ];
    }
}