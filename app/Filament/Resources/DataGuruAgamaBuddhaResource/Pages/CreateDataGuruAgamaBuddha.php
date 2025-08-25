<?php

namespace App\Filament\Resources\DataGuruAgamaBuddhaResource\Pages;

use App\Filament\Resources\DataGuruAgamaBuddhaResource;
use App\Models\DataGuruAgamaBuddha;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataGuruAgamaBuddha extends CreateRecord
{
    protected static string $resource = DataGuruAgamaBuddhaResource::class;

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return DataGuruAgamaBuddhaResource::getUrl('index');
    }
}