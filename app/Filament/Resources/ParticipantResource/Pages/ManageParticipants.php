<?php

namespace App\Filament\Resources\ParticipantResource\Pages;


use App\Filament\Resources\ParticipantResource\Widgets;
use App\Filament\Resources\ParticipantResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageParticipants extends ManageRecords
{
    protected static string $resource = ParticipantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


     /**
     * The header widgets.
     */
    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\ChurchParticipantCountOverview::class,
        ];
    }
}
