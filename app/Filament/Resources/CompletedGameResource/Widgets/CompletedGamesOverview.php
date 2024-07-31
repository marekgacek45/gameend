<?php

namespace App\Filament\Resources\CompletedGameResource\Widgets;

use App\Models\CompletedGame;
use Illuminate\Support\Carbon;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class CompletedGamesOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $currentYear = Carbon::now()->year;

        return [
            Stat::make('Ukończone gry ', CompletedGame::count()),
            Stat::make('Ukończone gry w ' . $currentYear, CompletedGame::where('year', $currentYear)->count()),
        ];
    }
}
