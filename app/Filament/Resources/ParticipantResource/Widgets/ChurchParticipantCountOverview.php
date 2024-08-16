<?php

namespace App\Filament\Resources\ParticipantResource\Widgets;

use App\Models\Church;
use App\Models\Participant;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ChurchParticipantCountOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $all = Participant::all()->count();
        $bugayong = Participant::where('church_id', 1)->count();
        $balangobong = Participant::where('church_id', 2)->count();
        $sanBonifacio = Participant::where('church_id', 3)->count();
        $rosales = Participant::where('church_id', 4)->count();
        $basista = Participant::where('church_id', 5)->count();
        $labrador = Participant::where('church_id', 6)->count();
        $mabini = Participant::where('church_id', 7)->count();
        $alcala = Participant::where('church_id', 8)->count();
        // $alcalaAnulid = Participant::where('church_id', 9)->count();
        // $alcalaBokil = Participant::where('church_id', 10)->count();

        return [
            Stat::make('All', $all)->icon('heroicon-o-users'),
            Stat::make('FCC Bugayong', $bugayong)->icon('heroicon-o-users'),
            Stat::make('FCC Balangobong', $balangobong)->icon('heroicon-o-users'),
            Stat::make('FCC San Bonifacio', $sanBonifacio)->icon('heroicon-o-users'),
            Stat::make('FCC Rosales', $rosales)->icon('heroicon-o-users'),
            Stat::make('FCC Basista', $basista)->icon('heroicon-o-users'),
            Stat::make('FCC Labrador', $labrador)->icon('heroicon-o-users'),
            Stat::make('FCC Mabini', $mabini)->icon('heroicon-o-users'),
            Stat::make('FCC Alcala', $alcala)->icon('heroicon-o-users'),
            // Stat::make('FCC Alcala (Anulid)', $alcalaAnulid)->icon('heroicon-o-users'),
            // Stat::make('FCC Alcala (Bokil)', $alcalaBokil)->icon('heroicon-o-users'),
        ];
    }
}
