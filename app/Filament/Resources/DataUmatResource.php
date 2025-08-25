<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataUmatResource\Pages;
use App\Filament\Resources\DataUmatResource\RelationManagers;
use App\Models\DataUmat;
use Filament\Forms\Components\DatePicker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;

class DataUmatResource extends Resource
{
    protected static ?string $model = DataUmat::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = "Kumpulan Arsip";

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Umat')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('vihara_id')
                                ->options(
                                    \App\Models\DataVihara::all()->pluck('nama_vihara', 'id')
                                )
                                ->searchable()
                                ->label('Vihara Asal')
                                ->required(),

                            TextInput::make('nama')
                                ->label('Nama Umat')
                                ->required(),

                            TextInput::make('nik')
                                ->label('Nomor Identitas')
                                ->required(),

                            TextInput::make('alamat')
                                ->label('Alamat Lengkap')
                                ->required(),

                            TextInput::make('telepon')
                                ->label('Nomor Handphone'),

                            TextInput::make('email')
                                ->label('Email'),
                                
                            Select::make('jenis_kelamin')
                                ->label('Jenis Kelamin')
                                ->options([
                                    'L'=>'Laki-Laki',
                                    'P'=>'Perempuan',
                                ]),
                            
                                DatePicker::make('tanggal_lahir')
                                ->label('Tanggal Lahir')
                                ->required()
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
                Tables\Columns\TextColumn::make('datavihara.nama_vihara') // dari relasi
                    ->label('Nama Vihara')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')->limit(50),
                Tables\Columns\TextColumn::make('nik'),
                Tables\Columns\TextColumn::make('alamat')->limit(15),
                Tables\Columns\TextColumn::make('telepon')->label('Kontak'),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('tanggal_lahir'),
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
            'index' => Pages\ListDataUmats::route('/'),
            'create' => Pages\CreateDataUmat::route('/create'),
            'edit' => Pages\EditDataUmat::route('/{record}/edit'),
            // 'view' => Pages\ViewDataUmat::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('datavihara');
    }

}