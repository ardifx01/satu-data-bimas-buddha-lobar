<?php

namespace App\Filament\Resources\DataProposalResource\Pages;

use App\Filament\Resources\DataProposalResource;
use App\Models\DataProposal;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataProposal extends CreateRecord
{
    protected static string $resource = DataProposalResource::class;

    //Method untuk redirect url ke Index
    protected function getRedirectUrl(): string
    {
        return DataProposalResource::getUrl('index');
    }
}