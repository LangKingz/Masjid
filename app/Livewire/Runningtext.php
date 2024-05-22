<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Runningtext extends Component
{
    public $posts;

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

    public function addNewPost($newPostContent)
    {
        try {
            // Tambahkan posting baru ke basis data
            Post::create(['content' => $newPostContent]);

            // Perbarui daftar posting
            $this->refreshPosts();

            // Beri tahu pengguna bahwa penambahan berhasil
            session()->flash('message', 'New post added successfully.');
        } catch (\Exception $e) {
            // Tangani kesalahan jika penambahan gagal
            session()->flash('error', 'Failed to add new post. ' . $e->getMessage());
        }
    }
}
