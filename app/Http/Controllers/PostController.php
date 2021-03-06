<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $pages = Page::all();
        return view('blog-post', [
            'post' => $post,
            'pages' => $pages,
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        $inputs = request()->validate([
            'title' => 'required|unique:posts|max:255',
            'post_image' => 'mimes:jpg,bmp,png',
            'body' => 'required',
        ]);

        if (request('post_image')) {

            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('create', 'Post has been created');

        return redirect()->route('admin.view.posts');

    }

    public function view()
    {
        $posts = Post::all();
        return view('admin.posts.posts', ['posts' => $posts]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $inputs = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'post_image' => ['file'],
            'body' => ['string', 'max:5000'],
        ]);

        if (request('post_image')) {

            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $post->update($inputs);

        session()->flash('update', 'Post has been updated');

        return redirect()->route('admin.view.posts');
    }

    public function destroy(Post $post, Request $request)
    {

        $post->delete();

        $request->session()->flash('destroy', 'Post: ' . $post->title . 'has been deleted');
        return back();
    }

}
