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
        $pages = Page::orderBy('updated_at', 'DESC')->get();
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(5);
        return view('components.home-master', ['posts' => $posts, 'pages' => $pages]);
    }
}
