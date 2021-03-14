<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function show(Page $page)
    {

        return view('components.page-master', ['page' => $page]);
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
            'title' => ['required', 'string', 'max:255'],
            'slug' => 'required|min:3|max:255|unique:pages,id,' . $page->slug,
            'page_image' => ['file'],
            'body' => ['string', 'max:5000'],
        ]);

        $inputs['slug'] = Str::slug($inputs['slug'], '-');

        if (request('page_image')) {

            $inputs['page_image'] = request('page_image')->store('images');
            $page->page_image = $inputs['page_image'];
        }

        $page->title = $inputs['title'];
        $page->body = $inputs['body'];

        $page->update($inputs);

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
            'title' => 'required|unique:pages|max:255',
            'slug' => 'required|min:3|max:255|unique:pages',
            'page_image' => 'mimes:jpg,bmp,png',
            'body' => 'required',
        ]);

        $inputs['slug'] = Str::slug($inputs['slug'], '-');

        if (request('page_image')) {

            $inputs['page_image'] = request('page_image')->store('images');
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
