<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Movie;
use App\Models\TopGame;
use App\Models\Category;
use App\Models\CompletedGame;
use App\Observers\TagObserver;
use App\Observers\PostObserver;
use App\Observers\MovieObserver;
use App\Observers\TopGameObserver;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\CompletedGameObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Category::observe(CategoryObserver::class);
        CompletedGame::observe(CompletedGameObserver::class);
        Movie::observe(MovieObserver::class);
        Post::observe(PostObserver::class);
        Tag::observe(TagObserver::class);
        TopGame::observe(TopGameObserver::class);
    }
}