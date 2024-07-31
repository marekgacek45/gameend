<?php

namespace App\Filament\Resources\TopGameResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\TopGameResource;
use App\Filament\Resources\TopGameResource\Widgets\TopGamesOverview;

class ListTopGames extends ListRecords
{
    protected static string $resource = TopGameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    protected function getHeaderWidgets(): array
    {
        return [
            
            TopGamesOverview::class,
        ];
    }
}
