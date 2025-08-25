<?php

namespace App\Filament\Resources\KegiatanPenyuluhResource\Pages;

use App\Filament\Resources\KegiatanPenyuluhResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKegiatanPenyuluh extends EditRecord
{
    protected static string $resource = KegiatanPenyuluhResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return KegiatanPenyuluhResource::getUrl('index');
    }
}