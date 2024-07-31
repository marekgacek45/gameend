<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class CategoryOverview extends BaseWidget
{
    protected function getStats(): array
    {
      
        $totalCategories = Category::count();

       
        $mostPopularCategory = Category::withCount('posts') 
            ->orderBy('posts_count', 'desc')
            ->first();

     
        $mostPopularCategoryName = $mostPopularCategory->title;

        return [


            Stat::make('Kategorii Łącznie', $totalCategories),
            Stat::make('Najpopularniejsza kategoria', $mostPopularCategoryName),
        ];
    }
}
