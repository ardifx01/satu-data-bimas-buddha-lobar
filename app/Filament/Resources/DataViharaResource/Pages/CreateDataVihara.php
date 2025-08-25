<?php

namespace App\Filament\Resources\DataViharaResource\Pages;

use App\Filament\Resources\DataViharaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataVihara extends CreateRecord
{
    protected static string $resource = DataViharaResource::class;

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return DataViharaResource::getUrl('index');
    }
}