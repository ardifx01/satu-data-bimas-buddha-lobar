<?php

namespace App\Filament\Resources\LembagaKeagamaanBuddhaResource\Pages;

use App\Filament\Resources\LembagaKeagamaanBuddhaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLembagaKeagamaanBuddha extends CreateRecord
{
    protected static string $resource = LembagaKeagamaanBuddhaResource::class;

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return LembagaKeagamaanBuddhaResource::getUrl('index');
    }
}