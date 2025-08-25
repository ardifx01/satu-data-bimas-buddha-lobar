<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisiMisiResource\Pages;
use App\Filament\Resources\VisiMisiResource\RelationManagers;
use App\Models\VisiMisi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = "Visi dan Misi";

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('visi')
                ->label('Visi')
                ->required()
                ->rows(5),

            Textarea::make('misi')
                ->label('Misi')
                ->required()
                ->rows(7),

                FileUpload::make('gambar')
                ->label('Banner')
                ->image()
                ->directory('visi-misi')
                ->disk('public')
                ->preserveFilenames()
                ->imagePreviewHeight('150')
                ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg'])
                ->nullable()
                ->imageEditor()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor')->label('No')->rowIndex(),
                TextColumn::make('visi')->limit(50),
                TextColumn::make('misi')->limit(50),
                ImageColumn::make('gambar')
                    ->label('Banner')
                    ->disk('public') // Sangat penting!
                    // ->directory('storage/visi-misi') // opsional jika path sudah disimpan
                    ->height(80)
                    ->circular(), // opsional styling
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListVisiMisis::route('/'),
            'create' => Pages\CreateVisiMisi::route('/create'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }
}