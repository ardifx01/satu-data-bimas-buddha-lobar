<?php

namespace App\Filament\Resources\DataViharaResource\Pages;

use App\Filament\Resources\DataViharaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataVihara extends EditRecord
{
    protected static string $resource = DataViharaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return DataViharaResource::getUrl('index');
    }
}