<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;

class BlogShow extends Component
{
    public $slug;

    public $post;
    public $latestPosts;

    public $title = '';
    public $description = '';



   
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->loadPost();
        $this->latestPosts = $this->getLatestPosts();
    }

    public function loadPost()
    {
        $this->post = Post::with('categories')->where('slug', $this->slug)->firstOrFail();
    }

    public function getLatestPosts()
    {
        $posts = Post::published()->orderByDesc('published_at')->take(4)->get();

        $filteredPosts = $posts->filter(function ($p) {
            return $p->id !== $this->post->id;
        });

        return $filteredPosts->take(3);
    }
    public function render()
    {
        return view('livewire.blog.blog-show')->layout('components.layouts.app', [
            'title' => $this->post->title,
            'description' =>  str_replace(['"', "'"], '', substr(html_entity_decode(strip_tags($this->post->content)), 0, 160))
        ]);
    }
}
