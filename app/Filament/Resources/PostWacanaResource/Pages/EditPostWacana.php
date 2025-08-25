<?php

namespace App\Filament\Resources\PostWacanaResource\Pages;

use App\Filament\Resources\PostWacanaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostWacana extends EditRecord
{
    protected static string $resource = PostWacanaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return PostWacanaResource::getUrl('index');
    }
}