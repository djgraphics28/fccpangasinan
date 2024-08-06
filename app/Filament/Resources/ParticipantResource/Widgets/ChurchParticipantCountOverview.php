<?php

namespace App\Filament\Resources\ParticipantResource\Widgets;

use App\Models\Church;
use Illuminate\Support\Number;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ChurchParticipantCountOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $churches = Church::all();

        return array_map(function ($church) {
            return Stat::make($church->name, Number::format($church->participants()->count()))
                // ->description('Description here if needed')
                ->icon('heroicon-o-users');
        }, $churches->all());
    }
}
