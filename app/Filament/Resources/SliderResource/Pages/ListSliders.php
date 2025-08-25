<?php

namespace App\Filament\Resources\SliderResource\Pages;

use App\Filament\Resources\SliderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\IconPosition;

class ListSliders extends ListRecords
{
    protected static string $resource = SliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Slider') // kosongkan label
                ->icon('heroicon-m-plus') // icon tambah
                ->iconPosition(IconPosition::Before)
                ->tooltip('Tambah Slider'), // agar ada hover text
        ];
    }
}