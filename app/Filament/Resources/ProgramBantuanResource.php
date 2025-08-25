<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramBantuanResource\Pages;
use App\Filament\Resources\ProgramBantuanResource\RelationManagers;
use App\Models\ProgramBantuan;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;

class ProgramBantuanResource extends Resource
{
    protected static ?string $model = ProgramBantuan::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationGroup = "Data Program Bantuan";

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Program Bantuan')
                    ->schema([
                        Select::make('vihara_id')
                                ->options(
                                    \App\Models\DataVihara::all()->pluck('nama_vihara', 'id')
                                )
                                ->searchable()
                                ->label('Vihara Asal')
                                ->required(),
                        
                        // Select::make('category_id')
                        //         ->relationship('category', 'nama_kategori')
                        //         ->label('Kategori')
                        //         ->required(),
                        //         // ->searchable(),
                        
                        Grid::make(2)->schema([
                            TextInput::make('nama_program')
                                ->label('Nama Program')
                                ->placeholder('Ketikan nama lembaga...')
                                ->required(),

                            TextArea::make('deskripsi')
                                ->label('Deskripsi')
                                ->placeholder('Ketikan deskripsi...')
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
                                ->placeholder('Masukkan jumlah bantuan...')
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
        
            Tables\Columns\TextColumn::make('datavihara.nama_vihara')
                ->label('Nama Vihara')
                ->searchable(),
        
            Tables\Columns\TextColumn::make('nama_program')->limit(20),
            Tables\Columns\TextColumn::make('deskripsi'),
            Tables\Columns\TextColumn::make('status')->badge()
                ->color(fn (string $state): string => match ($state) {
                    'ajukan' => 'warning',
                    'disetujui' => 'success',
                    'ditolak' => 'danger',
                    default => 'gray',
                }),
        
            Tables\Columns\TextColumn::make('tanggal_pengajuan')->label('Tanggal Pengajuan'),
            Tables\Columns\TextColumn::make('tanggal_pencairan')->label('Tanggal Pencairan'),
        
            Tables\Columns\TextColumn::make('jumlah_bantuan')
                ->label('Jumlah Bantuan')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format((int) $state, 0, ',', '.')),
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
            'index' => Pages\ListProgramBantuans::route('/'),
            'create' => Pages\CreateProgramBantuan::route('/create'),
            'edit' => Pages\EditProgramBantuan::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('datavihara');
    }
}