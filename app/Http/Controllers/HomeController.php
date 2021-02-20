<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pages = Page::all();
        $posts = Post::all();
        return view('components.home-master', ['posts' => $posts, 'pages' => $pages]);
    }
}
