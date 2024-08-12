<?php

namespace App\Models;

use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    // RELATIONS

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }

    public function topGames(): BelongsToMany
    {
        return $this->belongsToMany(TopGame::class);
    }

    public function completedGames(): BelongsToMany
    {
        return $this->belongsToMany(CompletedGame::class);
    }

    // FORM
    public static function getForm(): array
    {
        return [
            TextInput::make('title')
                ->label('Tytuł')
                ->unique(ignoreRecord: true)
                ->required()
                ->minLength(3)
                ->maxLength(255)
                ->live(debounce: 1000)
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
            TextInput::make('slug')
                ->label('Slug')
                ->readonly()
                ->required()
                ->minLength(3)
                ->maxLength(255),
            FileUpload::make('thumbnail')
                ->required()
                ->label('Miniaturka')
                ->directory('thumbnails-categories')
                ->image()
                ->maxSize(4096)
                ->optimize('webp')
                ->imageEditor()
                ->imageEditorAspectRatios([
                    null,
                    '16:9',
                    '4:3',
                    '1:1',
                ]),
        ];
    }

    // METHODS
    public function getThumbnailUrl() : string
    {
        
        return  asset('storage/' . $this->thumbnail);
    }
}
