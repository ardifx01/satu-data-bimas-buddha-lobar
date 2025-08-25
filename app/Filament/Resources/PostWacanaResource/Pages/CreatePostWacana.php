<?php

namespace App\Filament\Resources\PostWacanaResource\Pages;

use App\Filament\Resources\PostWacanaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePostWacana extends CreateRecord
{
    protected static string $resource = PostWacanaResource::class;

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return PostWacanaResource::getUrl('index');
    }
}