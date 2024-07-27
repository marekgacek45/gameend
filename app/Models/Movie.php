<?php

namespace App\Models;

use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
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
        'link',
        'thumbnail',
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

    public function topGames(): BelongsToMany
    {
        return $this->belongsToMany(TopGame::class,);
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
                ->directory('thumbnails-movie')
                ->image()
                ->maxSize(4096)
                ->optimize('webp')
                ->imageEditor()
                ->imageEditorAspectRatios([
                    null,
                    '16:9',
                    '4:3',
                    '1:1',
                ])
                ->columnSpanFull(),
            TextInput::make('link')
                ->label('Link')
                ->required()
                ->url()
                ->columnSpanFull(),
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
                    Select::make('completed_game_id')
                        ->label('Ukończona gra')
                        ->relationship(
                            'completedGames',
                            'title',
                            function ($query) {
                                $currentYear = Carbon::now()->format('Y');
                                $query->where('year', $currentYear);
                            }
                        )
                        ->multiple()
                        ->preload()
                        ->searchable()
                        ->createOptionForm(CompletedGame::getForm())
                        ->placeholder('Mozesz wybrac kilka'),
                    Select::make('top_game_id')
                        ->label('Top of the Top')
                        ->relationship('topGames', 'title',)
                        ->multiple()
                        ->preload()
                        ->searchable()
                        ->createOptionForm(TopGame::getForm())
                        ->placeholder('Mozesz wybrac kilka'),
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
