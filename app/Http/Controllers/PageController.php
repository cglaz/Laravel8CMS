<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(Page $page)
    {
        $pages = Page::all();
        return view('components.page-master', ['page' => $page, 'pages' => $pages]);
    }

    public function view()
    {
        $pages = Page::all();
        return view('admin.pages.pages', ['pages' => $pages]);
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', ['page' => $page]);
    }

    public function update(Page $page)
    {
        $inputs = request()->validate([
            'title' => 'required|unique:posts|max:255',
            'post_image' => 'mimes:jpg,bmp,png',
            'body' => 'required',
        ]);

        if (request('post_image')) {

            $inputs['post_image'] = request('post_image')->store('images');
            $page->post_image = $inputs['post_image'];
        }

        $page->title = $inputs['title'];
        $page->body = $inputs['body'];

        $page->save();

        session()->flash('update', 'Page: ' . $page->title . ' has been updated');

        return redirect()->route('admin.view.pages');
    }

    public function create()
    {
        return view('admin.pages.create');
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

        $page = Page::create($inputs);

        session()->flash('create', 'Page: ' . $page->title . ' has been created');

        return redirect()->route('admin.view.pages');

    }

    public function destroy(Page $page, Request $request)
    {

        $page->delete();

        $request->session()->flash('destroy', 'Page: ' . $page->title . ' has been deleted');
        return back();
    }
}
