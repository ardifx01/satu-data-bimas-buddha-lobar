<?php

namespace App\Filament\Resources\ProgramBantuanResource\Pages;

use App\Filament\Resources\ProgramBantuanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProgramBantuan extends CreateRecord
{
    protected static string $resource = ProgramBantuanResource::class;

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return ProgramBantuanResource::getUrl('index');
    }
}