<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataGuruAgamaBuddhaResource\Pages;
use App\Models\DataGuruAgamaBuddha;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\IconPosition;
use Filament\Actions;

class DataGuruAgamaBuddhaResource extends Resource
{
    protected static ?string $model = DataGuruAgamaBuddha::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = "Data Guru";

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Guru')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('nama')
                                ->label('Nama Guru')
                                ->placeholder('Ketikan nama guru...')
                                ->maxLength(50)
                                ->required(),

                            TextInput::make('nip')
                                ->label('NIP')
                                ->placeholder('Ketikan nip...')
                                ->maxLength(50),

                            TextInput::make('tempat_lahir')
                                ->label('Tempat Lahir')
                                ->placeholder('Ketikan tempat lahir...')
                                ->maxLength(100),

                            DatePicker::make('tanggal_lahir')
                                ->label('Tanggal Lahir'),

                            Select::make('jenis_kelamin')
                                ->label('Jenis Kelamin')
                                ->options([
                                    'Laki-laki' => 'Laki-laki',
                                    'Perempuan' => 'Perempuan',
                                ])
                                ->required(),

                            TextInput::make('agama')
                                ->label('Agama')
                                ->default('Buddha')
                                ->disabled(),

                            TextInput::make('no_hp')
                                ->label('No HP')
                                ->placeholder('Masukan nomor handphone...')
                                ->maxLength(20),

                            TextInput::make('email')
                                ->label('Email')
                                ->placeholder('Ketikan email...')
                                ->email()
                                ->maxLength(100),

                            Textarea::make('alamat')
                                ->label('Alamat')
                                ->placeholder('Ketikan alamat lengkap...')
                                ->maxLength(255),

                            TextInput::make('tempat_tugas')
                                ->label('Nama Tempat Tugas')
                                ->placeholder('Ketikan nama tempat tugas...')
                                ->required(),
                        ]),
                        Select::make('category_id')
                                ->relationship('category', 'nama_kategori')
                                ->label('Kategori')
                                ->required(),
                    ])
                    ->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor')
                    ->label('No')
                    ->rowIndex(),
                TextColumn::make('nama')->label('Nama')->searchable(),
                TextColumn::make('nip')->label('NIP')->searchable(),
                TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
                TextColumn::make('tempat_tugas')->label('Tempat Tugas')->searchable(),
                TextColumn::make('category.nama_kategori')->label('Kategori'),
                TextColumn::make('no_hp')->label('HP'),
            ])
            ->filters([
                // Bisa ditambahkan filter kategori atau vihara
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataGuruAgamaBuddhas::route('/'),
            'create' => Pages\CreateDataGuruAgamaBuddha::route('/create'),
            'edit' => Pages\EditDataGuruAgamaBuddha::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('dataVihara', 'category');
    }
}