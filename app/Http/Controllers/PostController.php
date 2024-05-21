<?php

namespace App\Http\Controllers;

use App\Models\Runtext;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Runtext::all();
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

        Runtext::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Post created successfully.');
    }

    public function edit(Runtext $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Runtext $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }
    public function destroy(Runtext $post)
    {
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
    }
}
