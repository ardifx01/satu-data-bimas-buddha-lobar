<?php

namespace App\Filament\Resources\DataGuruAgamaBuddhaResource\Pages;

use App\Filament\Resources\DataGuruAgamaBuddhaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataGuruAgamaBuddha extends EditRecord
{
    protected static string $resource = DataGuruAgamaBuddhaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return DataGuruAgamaBuddhaResource::getUrl('index');
    }
}