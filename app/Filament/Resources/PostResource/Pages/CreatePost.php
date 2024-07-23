<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Models\Post;
use Filament\Actions;
use Filament\Forms\Set;
use App\Models\Category;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use App\Filament\Resources\PostResource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\DateTimePicker;
use Mokhosh\FilamentRating\Components\Rating;

class CreatePost extends CreateRecord
{

    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = PostResource::class;


    protected function getSteps()
    {
        return Post::getSteps();
    }
}
