<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostWacanaResource\Pages;
use App\Models\PostWacana;
use App\Models\KategoriWacana;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Illuminate\Support\Facades\Auth;

class PostWacanaResource extends Resource
{
    protected static ?string $model = PostWacana::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    protected static ?string $navigationGroup = 'Wacana';
    
    protected static ?int $navigationSort = 2;

    // public static function canAccess(): bool
    // {
    //     return Auth::user()?->hasRole(['super_admin', 'admin', 'user']);
    // }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('judul')
                    ->label('Judul')
                    ->placeholder('Tulis judul wacana...')
                    ->required()
                    ->debounce(500)
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        if ($state) {
                            $set('slug', Str::slug($state));
                        }
                    }),

                TextInput::make('slug')
                    ->label('Slug URL')
                    ->disabled() // Supaya tidak bisa diketik manual
                    ->dehydrated(), // Tetap dikirim saat submit

                Select::make('kategori_id')
                    ->label('Kategori')
                    ->options(KategoriWacana::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->required(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi Singkat')
                    ->rows(3)
                    ->maxLength(500)
                    ->nullable(),

                RichEditor::make('konten')
                    ->label('Isi Konten')
                    ->required(),

                FileUpload::make('gambar')
                    ->label('Gambar Utama')
                    ->image()
                    ->directory('wacana/gambar')
                    ->disk('public')
                    ->nullable(),

                FileUpload::make('audio')
                    ->label('File Audio (MP3/OGG)')
                    ->directory('wacana/audio')
                    ->disk('public')
                    ->acceptedFileTypes(['audio/mpeg', 'audio/ogg'])
                    ->nullable(),

                TextInput::make('video')
                    ->label('Link Video (YouTube atau URL Video)')
                    ->url()
                    ->nullable(),

                DatePicker::make('tanggal_terbit')
                    ->label('Tanggal Terbit')
                    ->required(),
                
                Select::make('status')
                    ->label('Status Publikasi')
                    ->options([
                        'draft' => 'Draft',
                        'publish' => 'Publish',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor')
                    ->label('No')
                    ->rowIndex(),
                TextColumn::make('nama')->label('Nama')->sortable()->searchable(),
                TextColumn::make('judul')->label('Judul')->sortable()->searchable(),
                TextColumn::make('kategori.nama')->label('Kategori')->sortable()->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'publish' => 'success',
                        'draft' => 'danger',
                        default => 'gray',
                        })
                    ->formatStateUsing(fn (string $state) => ucfirst($state)),
                    
                TextColumn::make('tanggal_terbit')->label('Tanggal Terbit')->date('d M Y')->sortable(),

                IconColumn::make('gambar')
                    ->label('Gambar')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),

                IconColumn::make('audio')
                    ->label('Audio')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),

                IconColumn::make('video')
                    ->label('Video')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPostWacanas::route('/'),
            'create' => Pages\CreatePostWacana::route('/create'),
            'edit' => Pages\EditPostWacana::route('/{record}/edit'),
        ];
    }
}