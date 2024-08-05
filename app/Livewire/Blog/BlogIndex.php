<?php

namespace App\Livewire\Blog;

use Livewire\Component;

class BlogIndex extends Component
{
    public $title = 'Strona z postami';
    public $description = 'meta desc strona z posatami';
    public function render()
    {
        return view('livewire.blog.blog-index')->layout('components.layouts.app', [
            'title' => $this->title,
            'description' => $this->description,
        ]);
    }
}
