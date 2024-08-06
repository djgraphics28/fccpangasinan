<?php

namespace App\Filament\Resources\ParticipantResource\Widgets;

use App\Models\Church;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ChurchParticipantCountOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $churches = Church::all()->count();

        // foreach ($churches as $church) {
        //     $stats[] = Stat::make($church->name, $church->participants()->count())->icon('heroicon-o-users');
        // }

        return [
            Stat::make('Total Requests', $churches)
                // ->description('The total number of Requests')
                ->icon('heroicon-o-users')

        ];
    }
}
