<?php

namespace App\Filament\Resources\LembagaPendidikanAgamaResource\Pages;

use App\Filament\Resources\LembagaPendidikanAgamaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLembagaPendidikanAgama extends CreateRecord
{
    protected static string $resource = LembagaPendidikanAgamaResource::class;

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return LembagaPendidikanAgamaResource::getUrl('index');
    }
}