<?php

namespace App\Filament\Resources\KategoriWacanaResource\Pages;

use App\Filament\Resources\KategoriWacanaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKategoriWacana extends CreateRecord
{
    protected static string $resource = KategoriWacanaResource::class;

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return KategoriWacanaResource::getUrl('index');
    }
}