<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostBeritaResource\Pages;
use App\Models\PostBerita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Support\Str;
use Filament\Forms\Set;

class PostBeritaResource extends Resource
{
    protected static ?string $model = PostBerita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = "Konten Publik";

    protected static ?string $navigationLabel = 'Post Berita';

    protected static ?string $pluralModelLabel = 'Daftar Berita';

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Berita')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('judul')
                                ->label('Judul Berita')
                                ->placeholder('Tulis judul berita...')
                                ->required()
                                ->reactive()
                                ->debounce(500)
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('slug', Str::slug($state));
                                }),

                            TextInput::make('slug')
                                ->label('Slug URL')
                                ->disabled() // Tidak bisa diketik/manual
                                ->dehydrated(), // Tetap dikirim ke database saat submit

                            FileUpload::make('gambar')
                                ->label('Gambar Utama')
                                ->image()
                                ->imageEditor()
                                ->directory('berita')
                                ->disk('public')
                                ->preserveFilenames()
                                ->nullable(),

                            Select::make('status')
                                ->label('Status Publikasi')
                                ->options([
                                    'draft' => 'Draft',
                                    'publish' => 'Publish',
                                ])
                                ->default('draft')
                                ->required(),

                            TextInput::make('penulis')
                                ->label('Penulis')
                                ->required(),

                            DateTimePicker::make('tanggal_terbit')
                                ->label('Tanggal Terbit')
                                ->nullable(),
                        ]),
                        RichEditor::make('konten')
                                ->label('Isi Konten')
                                ->required(),
                    ])
                    ->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->label('Judul')->searchable()->sortable(),
                TextColumn::make('slug')->label('Slug')->limit(30)->copyable(),
                TextColumn::make('penulis')->label('Penulis'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'publish' => 'success',
                        default => 'secondary',
                    }),
                TextColumn::make('tanggal_terbit')
                    ->label('Tanggal Terbit')
                    ->date('d M Y'),
                ImageColumn::make('gambar')->label('Gambar')->disk('public')->circular()->height(50),
            ])
            ->filters([])
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
            'index' => Pages\ListPostBeritas::route('/'),
            'create' => Pages\CreatePostBerita::route('/create'),
            'edit' => Pages\EditPostBerita::route('/{record}/edit'),
        ];
    }
}