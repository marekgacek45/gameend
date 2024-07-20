<?php

namespace App\Filament\Resources\CompletedGameResource\Pages;

use App\Filament\Resources\CompletedGameResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompletedGame extends EditRecord
{
    protected static string $resource = CompletedGameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
