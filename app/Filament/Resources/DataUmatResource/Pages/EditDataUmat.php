<?php

namespace App\Filament\Resources\DataUmatResource\Pages;

use App\Filament\Resources\DataUmatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataUmat extends EditRecord
{
    protected static string $resource = DataUmatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return DataUmatResource::getUrl('index');
    }
}