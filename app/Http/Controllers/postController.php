<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index(){
        $posts = post::all();
        return view('dashboard',compact('posts'));
    }

    public function create(){
        return view('admin.layouts.create');
    }

    public function store(Request $request ){
        $request->validate([
            'content' => 'required'
        ]);

        post::create($request->all());
        return redirect()->route('dashboard')->with('success');
        
    }

    public function edit(Post $post)
    {
        return view('admin.layouts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
    }


}
