<?php

namespace App\Livewire\Blog;

use App\Models\Tag;
use App\Models\Post;
use App\Models\TopGame;
use Livewire\Component;
use App\Models\Category;
use App\Models\CompletedGame;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class BlogIndex extends Component
{

    use  WithPagination;
    public $title = 'Strona z postami';
    public $description = 'meta desc strona z posatami';

    #[Computed]
    public function getCategoriesProperty()
    {
        return Category::withCount('posts')
            ->having('posts_count', '>', 0)
            ->orderBy('posts_count', 'desc')
            ->take(5)
            ->get();
    }
    #[Computed]
    public function getTagsProperty()
    {
        return Tag::withCount('posts')
            ->having('posts_count', '>', 0)
            ->orderBy('posts_count', 'desc')
            ->take(5)
            ->get();
    }
    #[Computed]
    public function getCompletedGamesProperty()
    {
        return CompletedGame::has('posts')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();;
    }
    #[Computed]
    public function getTopGamesProperty()
    {
        return TopGame::has('posts')
            ->orderBy('created_at', 'desc')
            ->take(5)
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
        return Post::with('categories')->published()->orderBy('published_at', 'desc')->paginate(6);
    }

    #[Computed]
    public function getPostsCountProperty()
    {
        return Post::published()->count();
    }


    public function render()
    {
        return view('livewire.blog.blog-index')->layout('components.layouts.app', [
            'title' => $this->title,
            'description' => $this->description,
        ]);
    }
}
