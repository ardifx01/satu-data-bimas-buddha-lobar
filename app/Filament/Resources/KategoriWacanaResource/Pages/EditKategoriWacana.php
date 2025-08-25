<?php

namespace App\Filament\Resources\KategoriWacanaResource\Pages;

use App\Filament\Resources\KategoriWacanaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriWacana extends EditRecord
{
    protected static string $resource = KategoriWacanaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return KategoriWacanaResource::getUrl('index');
    }
}