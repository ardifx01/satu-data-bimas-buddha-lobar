<?php

namespace App\Filament\Resources\LembagaPendidikanAgamaResource\Pages;

use App\Filament\Resources\LembagaPendidikanAgamaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLembagaPendidikanAgama extends EditRecord
{
    protected static string $resource = LembagaPendidikanAgamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return LembagaPendidikanAgamaResource::getUrl('index');
    }
}