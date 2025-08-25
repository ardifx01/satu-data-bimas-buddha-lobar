<?php

namespace App\Filament\Resources\ArsipKeuanganResource\Pages;

use App\Filament\Resources\ArsipKeuanganResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateArsipKeuangan extends CreateRecord
{
    protected static string $resource = ArsipKeuanganResource::class;

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return ArsipKeuanganResource::getUrl('index');
    }
}