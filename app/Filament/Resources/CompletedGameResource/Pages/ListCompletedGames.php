<?php

namespace App\Filament\Resources\CompletedGameResource\Pages;

use App\Filament\Resources\CompletedGameResource;
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
}
