<?php

namespace App\Filament\Resources\LembagaKeagamaanBuddhaResource\Pages;

use App\Filament\Resources\LembagaKeagamaanBuddhaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLembagaKeagamaanBuddha extends EditRecord
{
    protected static string $resource = LembagaKeagamaanBuddhaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return LembagaKeagamaanBuddhaResource::getUrl('index');
    }
}