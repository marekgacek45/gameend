<?php



use App\Livewire\Blog\BlogIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\CompletedGame\CompletedGameIndex;
use App\Livewire\TopGames\TopGamesIndex;

Route::get('/', BlogIndex::class)->name('home');
Route::get('/artykuly', BlogIndex::class)->name('post.index');
Route::get('/artykul/{slug}', BlogIndex::class)->name('post.show');
Route::get('/ukonczone-gry/artykuly', CompletedGameIndex::class)->name('completedGames.post.index');
Route::get('/top-of-the-top/artykuly', TopGamesIndex::class)->name('topOfTheTop.post.index');
