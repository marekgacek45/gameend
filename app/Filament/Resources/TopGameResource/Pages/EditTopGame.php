<?php

namespace App\Filament\Resources\TopGameResource\Pages;

use App\Filament\Resources\TopGameResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopGame extends EditRecord
{
    protected static string $resource = TopGameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
