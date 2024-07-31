<?php

namespace App\Filament\Resources\TopGameResource\Widgets;

use App\Models\TopGame;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TopGamesOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Liczba gier Top of The Top', TopGame::count()),
        ];
    }

   
}
