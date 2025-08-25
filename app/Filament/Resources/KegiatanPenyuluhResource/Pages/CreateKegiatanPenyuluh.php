<?php

namespace App\Filament\Resources\KegiatanPenyuluhResource\Pages;

use App\Filament\Resources\KegiatanPenyuluhResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKegiatanPenyuluh extends CreateRecord
{
    protected static string $resource = KegiatanPenyuluhResource::class;

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return KegiatanPenyuluhResource::getUrl('index');
    }
}