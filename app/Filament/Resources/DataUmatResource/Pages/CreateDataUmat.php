<?php

namespace App\Filament\Resources\DataUmatResource\Pages;

use App\Filament\Resources\DataUmatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataUmat extends CreateRecord
{
    protected static string $resource = DataUmatResource::class;
    
    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return DataUmatResource::getUrl('index');
    }
}