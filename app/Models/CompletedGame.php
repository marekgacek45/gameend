<?php

namespace App\Models;

use Carbon\Carbon;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CompletedGame extends Model
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
        'thumbnail',
        'year',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
    ];

    // RELATIONS
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
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
                ->directory('thumbnails-games')
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
                TextInput::make('year')
                ->label('Rok Ukończenia')
                ->integer()
                ->required()
                ->default(Carbon::now()->year),
                Fieldset::make('Powiązania')
                ->schema([
                    Select::make('category_id')
                        ->label('Kategoria')
                        ->relationship('categories', 'title',)
                        ->multiple()
                        ->preload()
                        ->searchable()
                        ->required()
                        ->createOptionForm(Category::getForm())
                        ->placeholder('Mozesz wybrac kilka'),
                    Select::make('tag_id')
                        ->label('Tag')
                        ->relationship('tags', 'title',)
                        ->multiple()
                        ->preload()
                        ->searchable()
                        ->createOptionForm(Tag::getForm())
                        ->placeholder('Mozesz wybrac kilka'),
                    Select::make('movie_id')
                        ->label('Filmy')
                        ->relationship('movies', 'title')
                        ->multiple()
                        ->columnSpanFull()
                        ->preload()
                        ->searchable()
                        ->placeholder('Mozesz wybrac kilka')
                        ,

                    Select::make('post_id')
                        ->label('Posty')
                        ->relationship('posts', 'title',)
                        ->multiple()
                        ->preload()
                        ->searchable()
                        ->columnSpanFull()
                        ->placeholder('Mozesz wybrac kilka'),
                ])
                
        ];
    }
}
