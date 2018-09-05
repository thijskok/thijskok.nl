<?php

namespace App\Http\Controllers;

use App\Post;

class TagPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tag)
    {
        $posts = Post::withAnyTags($tag)->paginate();

        return view('posts.index', compact('posts', 'tag'));
    }
}
