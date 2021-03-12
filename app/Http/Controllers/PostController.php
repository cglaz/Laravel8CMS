<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function sitemap()
    {
        $pages = Page::orderBy('updated_at', 'DESC')->get();
        $posts = Post::orderBy('updated_at', 'DESC')->get();
        return response()->view('sitemap', compact('posts', 'pages'))->header('Content-Type', 'text/xml');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title' => 'required|unique:posts|max:255',
            'slug' => 'required|min:3|max:255|unique:posts',
            'post_image' => 'mimes:jpg,bmp,png',
            'body' => 'required',
        ]);

        $inputs['slug'] = Str::slug($inputs['slug'], '-');

        if (request('post_image')) {

            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('create', 'Post has been created');

        return redirect()->route('admin.view.posts');

    }

    public function view()
    {
        $posts = auth()->user()->posts()->paginate(5);
        return view('admin.posts.posts', ['posts' => $posts]);
    }

    public function edit(Post $post)
    {
        //$this->authorize('view', $post);
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $inputs = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => 'required|min:3|max:255|unique:posts,id,' . $post->slug,
            'post_image' => ['file'],
            'body' => ['string', 'max:5000'],
        ]);

        $inputs['slug'] = Str::slug($inputs['slug'], '-');

        if (request('post_image')) {

            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $this->authorize('update', $post);

        $post->update($inputs);

        session()->flash('update', 'Post has been updated');

        return redirect()->route('admin.view.posts');
    }

    public function destroy(Post $post, Request $request)
    {

        $this->authorize('delete', $post);

        $post->delete();

        $request->session()->flash('destroy', 'Post: ' . $post->title . 'has been deleted');
        return back();
    }

}
