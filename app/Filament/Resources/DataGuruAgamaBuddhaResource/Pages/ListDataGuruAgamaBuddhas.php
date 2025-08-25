<?php

namespace App\Filament\Resources\DataGuruAgamaBuddhaResource\Pages;

use App\Filament\Resources\DataGuruAgamaBuddhaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\IconPosition;

class ListDataGuruAgamaBuddhas extends ListRecords
{
    protected static string $resource = DataGuruAgamaBuddhaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Data Guru') // kosongkan label
                ->icon('heroicon-m-plus') // icon tambah
                ->iconPosition(IconPosition::Before)
                ->tooltip('Tambah Data'), // agar ada hover text
        ];
    }
}