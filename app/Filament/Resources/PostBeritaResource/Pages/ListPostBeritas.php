<?php

namespace App\Filament\Resources\PostBeritaResource\Pages;

use App\Filament\Resources\PostBeritaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\IconPosition;

class ListPostBeritas extends ListRecords
{
    protected static string $resource = PostBeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Buat Post Berita') // kosongkan label
                ->icon('heroicon-m-plus') // icon tambah
                ->iconPosition(IconPosition::Before)
                ->tooltip('Buat Post Berita'), // agar ada hover text
        ];
    }
}