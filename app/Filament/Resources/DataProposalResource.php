<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataProposalResource\Pages;
use App\Models\DataProposal;
use App\Models\DataVihara;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;

class DataProposalResource extends Resource
{
    protected static ?string $model = DataProposal::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = "Data Program Bantuan";

    public static function getNavigationSort(): ?int
    {
        return 2;
    }
    protected static ?string $navigationLabel = 'Data Proposal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Program Bantuan')->schema([
                    Select::make('vihara_id')
                        ->label('Vihara Asal')
                        ->options(DataVihara::all()->pluck('nama_vihara', 'id'))
                        ->searchable()
                        ->required(),

                    Grid::make(2)->schema([
                        TextInput::make('nama_file')
                            ->label('Nama File')
                            ->required(),

                        FileUpload::make('file_path')
                            ->label('Upload Dokumen')
                            ->directory('arsip-dokumen')
                            ->visibility('public') // penting agar bisa diakses
                            ->acceptedFileTypes([
                                'application/pdf',
                                'application/msword',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            ])
                            ->maxSize(2048)
                            ->preserveFilenames()
                            ->openable()
                            ->required(),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'diajukan' => 'Diajukan',
                                'disetujui' => 'Disetujui',
                                'ditolak' => 'Ditolak',
                            ])
                            ->required()
                            ->native(false),

                        DatePicker::make('tanggal_pengajuan')
                            ->label('Tanggal Pengajuan')
                            ->required(),

                        DatePicker::make('tanggal_pencairan')
                            ->label('Tanggal Pencairan')
                            ->required(),

                        TextInput::make('jumlah_bantuan')
                            ->label('Jumlah Bantuan')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),
                    ]),
                ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor')
                ->label('No')
                ->rowIndex(),
                
                TextColumn::make('nama_file')->label('Nama File')->searchable(),

                TextColumn::make('datavihara.nama_vihara')
                ->label('Nama Vihara')
                ->searchable(),

                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'primary' => 'diajukan',
                        'success' => 'disetujui',
                        'danger' => 'ditolak',
                    ]),

                TextColumn::make('tanggal_pengajuan')
                    ->label('Pengajuan')
                    ->date('d M Y'),

                TextColumn::make('tanggal_pencairan')
                    ->label('Pencairan')
                    ->date('d M Y'),

                TextColumn::make('jumlah_bantuan')
                    ->label('Jumlah')
                    ->money('IDR', true),

                TextColumn::make('file_path')
                    ->label('Dokumen')
                    ->formatStateUsing(fn ($state) => $state ? 'View Dokumen' : '-')
                    ->url(fn ($record) => $record->file_path ? asset('storage/' . $record->file_path) : null, true)
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-document-arrow-down'), // opsional ikon
                
                

                // TextColumn::make('file_path')
                //     ->label('Dokumen')
                //     ->url(fn ($record) => $record->file_path ? Storage::url($record->file_path) : null, true)
                //     ->openUrlInNewTab()
                //     ->formatStateUsing(fn ($state) => $state ? 'Download' : '-'),

                TextColumn::make('created_at')->date('d M Y'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->actionsColumnLabel('Aksi')
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
            'index' => Pages\ListDataProposals::route('/'),
            'create' => Pages\CreateDataProposal::route('/create'),
            'edit' => Pages\EditDataProposal::route('/{record}/edit'),
            // 'view' => Pages\ViewDataProposal::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()->with('datavihara');
}
}