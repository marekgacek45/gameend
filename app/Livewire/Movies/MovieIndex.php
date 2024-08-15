<?php

namespace App\Livewire\Movies;

use App\Models\Post;
use App\Models\Movie;
use App\Models\TopGame;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\CompletedGame;
use Livewire\Attributes\Computed;

class MovieIndex extends Component
{

    use  WithPagination;
    public $title = 'Strona z filmami';
    public $description = 'meta desc strona z filmami';

    #[Url]
    public $category = '';
    #[Url]
    public $search = "";

    public function setCategory($categorySlug)
    {
        $this->category = $categorySlug;
    }

    public function clear()
    {
        $this->category = "";
        $this->search = "";
    }


    #[Computed]
    public function getCategoriesProperty()
    {
        return Category::withCount('movies')
            ->having('movies_count', '>', 0)
            ->orderBy('movies_count', 'desc')

            ->get();
    }
    #[Computed]
    public function getCompletedGamesProperty()
    {
        return CompletedGame::has('movies')
            ->orderBy('created_at', 'desc')
          
            ->get();;
    }
    #[Computed]
    public function getTopGamesProperty()
    {
        return TopGame::has('movies')
            ->orderBy('created_at', 'desc')
            
            ->get();
    }

  

    #[Computed]
    public function getMoviesProperty()
    {
        return Movie::with('categories')
            ->when($this->category, function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->where('slug', $this->category);
                });
            })

            ->whereRaw('LOWER(title) like ?', ["%" . strtolower($this->search) . "%"])


            
            ->orderBy('created_at', 'desc')
            ->paginate(12);
    }

    #[Computed]
    public function getMoviesCountProperty()
    {
        return Movie::with('categories')
            ->when($this->category, function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->where('slug', $this->category);
                });
            })
            ->whereRaw('LOWER(title) like ?', ["%" . strtolower($this->search) . "%"])
            
            ->count();
    }

    #[Computed]
    public function getPostCountByCategory($categorySlug)
    {
        return Movie::whereHas('categories', function ($query) use ($categorySlug) {
            $query->where('slug', $categorySlug);
        })
            
            
            ->count();
    }
    public function render()
    {
        return view('livewire.movies.movie-index')->layout('components.layouts.app', [
            'title' => $this->title,
            'description' => $this->description,
        ]);
    }
}
