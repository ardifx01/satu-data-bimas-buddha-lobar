<?php

namespace App\Filament\Resources\LembagaPendidikanAgamaResource\Pages;

use App\Filament\Resources\LembagaPendidikanAgamaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\IconPosition;

class ListLembagaPendidikanAgamas extends ListRecords
{
    protected static string $resource = LembagaPendidikanAgamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Lembaga Pendidikan') // kosongkan label
                ->icon('heroicon-m-plus') // icon tambah
                ->iconPosition(IconPosition::Before)
                ->tooltip('Tambah Data'), // agar ada hover text
        ];
    }
}