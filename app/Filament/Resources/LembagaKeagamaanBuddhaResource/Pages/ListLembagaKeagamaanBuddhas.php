<?php

namespace App\Filament\Resources\LembagaKeagamaanBuddhaResource\Pages;

use App\Filament\Resources\LembagaKeagamaanBuddhaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\IconPosition;

class ListLembagaKeagamaanBuddhas extends ListRecords
{
    protected static string $resource = LembagaKeagamaanBuddhaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Lembaga Keagamaan') // kosongkan label
                ->icon('heroicon-m-plus') // icon tambah
                ->iconPosition(IconPosition::Before)
                ->tooltip('Tambah Data'), // agar ada hover text
        ];
    }
}