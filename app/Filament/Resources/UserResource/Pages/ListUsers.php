<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\IconPosition;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah User') // kosongkan label
                ->icon('heroicon-m-plus') // icon tambah
                ->iconPosition(IconPosition::Before)
                ->tooltip('Tambah User'), // agar ada hover text
        ];
    }
}