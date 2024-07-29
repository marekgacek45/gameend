<?php

namespace App\Models;

use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\DateTimePicker;
use Mokhosh\FilamentRating\Components\Rating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
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
        'content',
        'thumbnail',
        'gallery',
        'rating',
        'featured',
        'published_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'gallery' => 'array',
        'featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
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

    public static function getSteps() :array{
        return [
            Step::make('Treść')
            ->icon('heroicon-o-pencil')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Tytuł')
                            ->unique(ignoreRecord: true)
                            ->required()
                            ->minLength(3)
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->readonly()
                            ->required()
                            ->minLength(3)
                            ->maxLength(255),
                        RichEditor::make('content')
                            ->label('Treść posta')
                            ->required()
                            ->columnSpanFull(),
                        Rating::make('rating')
                            ->label('Ocena')
                            ->default(0)
                            ->allowZero(),
                        Toggle::make('featured')
                            ->label('Polecany')
                            ->columnSpanFull()
                            ->onIcon('heroicon-o-star'),
                    ]),
                    Step::make('Zdjęcia')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->required()
                            ->label('Miniaturka')
                            ->directory('thumbnails-post')
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
                        FileUpload::make('gallery')
                            ->label('Galeria')
                            ->directory('images')
                            ->multiple()
                            ->appendFiles()
                            ->image()
                            ->maxSize(4096)
                            ->optimize('webp')
                            ->minFiles(3)
                            ->maxFiles(9)

                            ->panelLayout('grid')
                            ->reorderable()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            
                            ->columnSpanFull(),


                    ]),
                    Step::make('Powiązania')
                    ->icon('heroicon-o-arrows-right-left')
                    ->columns(2)
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
                                'title'
                                , function ($query) {
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
                        Select::make('movie_id')
                            ->label('Filmy')
                            ->relationship('movies', 'title',)
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->createOptionForm(Movie::getForm())
                            ->columnSpanFull()
                            ->placeholder('Mozesz wybrac kilka'),
                    ]),
                    Step::make('Publikacja')
                    ->icon('heroicon-o-clock')
                    ->schema([
                        DateTimePicker::make('published_at')
                            ->label('Data publikacji')
                            ->columns(1)
                            ->default(now())
                            ->required(),
                            ])  
        ];
    }
}
