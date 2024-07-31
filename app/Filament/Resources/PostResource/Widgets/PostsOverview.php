<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use Illuminate\Support\Carbon;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PostsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Opuplikowane posty', Post::where('published_at', '<=', Carbon::now())->count()),
            Stat::make('Czekają na publikacje', Post::where('published_at', '>=', Carbon::now())->count()),
            Stat::make('Suma gier 5/5', Post::where('rating', '5')->count()),
        ];
    }
}
