<?php

namespace App\Filament\Resources\PostBeritaResource\Pages;

use App\Filament\Resources\PostBeritaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostBerita extends EditRecord
{
    protected static string $resource = PostBeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    
    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return PostBeritaResource::getUrl('index');
    }
}