<?php

namespace App\Filament\Resources\DataProposalResource\Pages;

use App\Filament\Resources\DataProposalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\IconPosition;

class ListDataProposals extends ListRecords
{
    protected static string $resource = DataProposalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Data Proposal') // kosongkan label
                ->icon('heroicon-m-plus') // icon tambah
                ->iconPosition(IconPosition::Before)
                ->tooltip('Tambah Data'), // agar ada hover text
        ];
    }
}