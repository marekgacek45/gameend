<?php

namespace App\Livewire\Blog;

use App\Models\Tag;
use App\Models\Post;
use App\Models\TopGame;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\CompletedGame;
use Livewire\Attributes\Computed;

class BlogIndex extends Component
{

    use  WithPagination;
    public $title = 'Strona z postami';
    public $description = 'meta desc strona z posatami';

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
        return Category::withCount('posts')
            ->having('posts_count', '>', 0)
            ->orderBy('posts_count', 'desc')

            ->get();
    }
    #[Computed]
    public function getCompletedGamesProperty()
    {
        return CompletedGame::has('posts')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();;
    }
    #[Computed]
    public function getTopGamesProperty()
    {
        return TopGame::has('posts')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
    }

    #[Computed]
    public function getFeaturedPostsProperty()
    {
        return Post::published()
            ->where('featured', true)
            ->orderBy('published_at', 'desc')
            ->get();
    }

    #[Computed]
    public function getPostsProperty()
    {
        return Post::with('categories')
            ->when($this->category, function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->where('slug', $this->category);
                });
            })

            ->whereRaw('LOWER(title) like ?', ["%" . strtolower($this->search) . "%"])


            ->published()
            ->orderBy('published_at', 'desc')
            ->paginate(6);
    }

    #[Computed]
    public function getPostsCountProperty()
    {
        return Post::with('categories')
            ->when($this->category, function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->where('slug', $this->category);
                });
            })
            ->whereRaw('LOWER(title) like ?', ["%" . strtolower($this->search) . "%"])
            ->published()
            ->count();
    }

    #[Computed]
    public function getPostCountByCategory($categorySlug)
    {
        return Post::whereHas('categories', function ($query) use ($categorySlug) {
            $query->where('slug', $categorySlug);
        })
            
            ->published()
            ->count();
    }


    public function render()
    {
        return view('livewire.blog.blog-index')->layout('components.layouts.app', [
            'title' => $this->title,
            'description' => $this->description,
        ]);
    }
}
