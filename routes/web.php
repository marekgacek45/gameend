<?php



use App\Livewire\Blog\BlogShow;
use App\Livewire\Blog\BlogIndex;
use App\Livewire\Movies\MovieIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\TopGames\TopGamesIndex;
use App\Livewire\CompletedGame\CompletedGameIndex;


Route::get('/', BlogIndex::class)->name('home');
Route::get('/artykuly', BlogIndex::class)->name('blog.index');
Route::get('/filmy', MovieIndex::class)->name('movie.index');
Route::get('/artykul/{slug}', BlogShow::class)->name('blog.show');
Route::get('/ukonczone-gry/artykuly', CompletedGameIndex::class)->name('completedGames.blog.index');

Route::get('/top-of-the-top/artykuly', TopGamesIndex::class)->name('topOfTheTop.blog.index');
