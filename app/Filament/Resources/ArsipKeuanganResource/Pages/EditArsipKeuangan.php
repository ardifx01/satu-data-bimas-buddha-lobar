<?php

namespace App\Filament\Resources\ArsipKeuanganResource\Pages;

use App\Filament\Resources\ArsipKeuanganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArsipKeuangan extends EditRecord
{
    protected static string $resource = ArsipKeuanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return ArsipKeuanganResource::getUrl('index');
    }
}