<?php

namespace App\Filament\Resources\MovieResource\Widgets;

use App\Models\Movie;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class MovieOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Liczba filmów', Movie::count()),
          
        ];
    }
}
