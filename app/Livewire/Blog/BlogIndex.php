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
        return Category::has('posts')->get();
    }
    #[Computed]
    public function getTagsProperty()
    {
        return Tag::has('posts')->get();
    }
    #[Computed]
    public function getCompletedGamesProperty()
    {
        return CompletedGame::has('posts')->get();
    }
    #[Computed]
    public function getTopGamesProperty()
    {
        return TopGame::has('posts')->get();
    }

    #[Computed]
    public function getPostsProperty()
    {
        return Post::with('categories')->published()->paginate(6);
    }


    public function render()
    {
        return view('livewire.blog.blog-index')->layout('components.layouts.app', [
            'title' => $this->title,
            'description' => $this->description,
        ]);
    }
}
