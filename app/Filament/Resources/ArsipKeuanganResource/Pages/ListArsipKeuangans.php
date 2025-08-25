<?php

namespace App\Filament\Resources\ArsipKeuanganResource\Pages;

use App\Filament\Resources\ArsipKeuanganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\IconPosition;

class ListArsipKeuangans extends ListRecords
{
    protected static string $resource = ArsipKeuanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Arsip Keuangan') // kosongkan label
                ->icon('heroicon-m-plus') // icon tambah
                ->iconPosition(IconPosition::Before)
                ->tooltip('Tambah Arsip Keuangan'), // agar ada hover text
        ];
    }
}