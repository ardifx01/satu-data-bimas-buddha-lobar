<?php

namespace App\Filament\Resources\KategoriWacanaResource\Pages;

use App\Filament\Resources\KategoriWacanaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\IconPosition;

class ListKategoriWacanas extends ListRecords
{
    protected static string $resource = KategoriWacanaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Buat Kategori Wacana') // kosongkan label
                ->icon('heroicon-m-plus') // icon tambah
                ->iconPosition(IconPosition::Before)
                ->tooltip('Buat Kategori Wacana'), // agar ada hover text
        ];
    }
}