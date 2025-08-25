<?php

namespace App\Filament\Resources\PostWacanaResource\Pages;

use App\Filament\Resources\PostWacanaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\IconPosition;

class ListPostWacanas extends ListRecords
{
    protected static string $resource = PostWacanaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Buat Post Buddha Wacana') // kosongkan label
                ->icon('heroicon-m-plus') // icon tambah
                ->iconPosition(IconPosition::Before)
                ->tooltip('Buat Post Buddha Wacana'), // agar ada hover text
        ];
    }
}