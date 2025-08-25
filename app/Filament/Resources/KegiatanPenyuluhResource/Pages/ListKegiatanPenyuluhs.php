<?php

namespace App\Filament\Resources\KegiatanPenyuluhResource\Pages;

use App\Filament\Resources\KegiatanPenyuluhResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\IconPosition;

class ListKegiatanPenyuluhs extends ListRecords
{
    protected static string $resource = KegiatanPenyuluhResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Buat Laporan Penyuluh') // kosongkan label
                ->icon('heroicon-m-plus') // icon tambah
                ->iconPosition(IconPosition::Before)
                ->tooltip('Daftar Laporan Penyuluh'), // agar ada hover text
        ];
    }
}