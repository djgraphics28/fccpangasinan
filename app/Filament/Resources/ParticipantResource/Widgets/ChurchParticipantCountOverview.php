<?php

namespace App\Filament\Resources\ParticipantResource\Widgets;

use App\Models\Church;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ChurchParticipantCountOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $churches = Church::all();

        foreach ($churches as $church) {
            $stats[] = Stat::make($church->name, $church->participants()->count());
        }

        return $stats;
    }
}
