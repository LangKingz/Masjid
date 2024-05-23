<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('dashboard', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post = Post::create($request->all());

        // Kirim event ke Livewire
        $this->sendLivewireEvent('post-added', $post);

        return redirect()->route('dashboard');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post->update($request->all());

        // Kirim event ke Livewire
        $this->sendLivewireEvent('post-updated', $post);

        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        // Kirim event ke Livewire
        $this->sendLivewireEvent('post-deleted', $post);

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
    }

    protected function sendLivewireEvent($event, $data)
    {
        // Simpan data event di session agar bisa diakses oleh JavaScript
        session()->flash('livewire-event', [
            'name' => $event,
            'data' => $data
        ]);
    }
}
