<?php

namespace App\Filament\Resources\DataProposalResource\Pages;

use App\Filament\Resources\DataProposalResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\Facades\Storage;

class ViewDataProposal extends ViewRecord
{
    protected static string $resource = DataProposalResource::class;

    protected function getFormSchema(): array
    {
        return [
            \Filament\Forms\Components\Section::make('Data Program Bantuan')->schema([
                \Filament\Forms\Components\Placeholder::make('datavihara.nama_vihara')
                    ->label('Vihara Asal')
                    ->content(fn ($record) => $record->datavihara->nama_vihara ?? '-'),

                TextInput::make('nama_file')->label('Nama File')->disabled(),

                Placeholder::make('file_path')
                    ->label('View Dokumen')
                    ->content(fn ($record) => $record->file_path
                        ? '<a href="' . Storage::url($record->file_path) . '" target="_blank" class="text-blue-600 underline">Lihat Dokumen</a>'
                        : '-'
                    )
                    ->disableLabelWhenHidden()
                    ->extraAttributes(['class' => 'prose'])
                    ->columnSpanFull(),

                TextInput::make('status')->label('Status')->disabled(),
                TextInput::make('tanggal_pengajuan')->label('Tanggal Pengajuan')->disabled(),
                TextInput::make('tanggal_pencairan')->label('Tanggal Pencairan')->disabled(),
                TextInput::make('jumlah_bantuan')->label('Jumlah Bantuan')->disabled(),
            ]),
        ];
    }
}