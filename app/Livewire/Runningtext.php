<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Runningtext extends Component
{
    public $posts;

    protected $listeners = ['post-added', 'post-updated', 'post-deleted'];

    public function mount()
    {
        $this->refreshPosts();
    }

    public function render()
    {
        return view('livewire.runningtext');
    }

    public function refreshPosts()
    {
        $this->posts = Post::all();
    }

    public function postAdded($post)
    {
        $this->refreshPosts();
    }

    public function postUpdated($post)
    {
        $this->refreshPosts();
    }

    public function postDeleted($post)
    {
        $this->refreshPosts();
    }
}
