<?php

namespace App\Filament\Resources\PostBeritaResource\Pages;

use App\Filament\Resources\PostBeritaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePostBerita extends CreateRecord
{
    protected static string $resource = PostBeritaResource::class;

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return PostBeritaResource::getUrl('index');
    }
}