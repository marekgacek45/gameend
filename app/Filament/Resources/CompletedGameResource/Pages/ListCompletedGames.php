<?php

namespace App\Filament\Resources\CompletedGameResource\Pages;

use App\Filament\Resources\CompletedGameResource;
use App\Filament\Resources\CompletedGameResource\Widgets\CompletedGamesOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompletedGames extends ListRecords
{
    protected static string $resource = CompletedGameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    
    protected function getHeaderWidgets(): array
    {
        return [
            
            CompletedGamesOverview::class,
        ];
    }
}
