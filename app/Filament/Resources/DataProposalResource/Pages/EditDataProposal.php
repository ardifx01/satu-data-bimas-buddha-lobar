<?php

namespace App\Filament\Resources\DataProposalResource\Pages;

use App\Filament\Resources\DataProposalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataProposal extends EditRecord
{
    protected static string $resource = DataProposalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return DataProposalResource::getUrl('index');
    }
}