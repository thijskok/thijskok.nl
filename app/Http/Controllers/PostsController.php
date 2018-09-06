<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * PostsController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::query()
            ->orderByPublicationDate()
            ->paginate();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', ['post' => new Post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->fill($request->only(['title', 'text', 'published_at']))
             ->author()->associate(auth()->user());

        $post->save();

        $post->syncTags(explode(',', $request->get('tags')));

        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->only(['title', 'text', 'published_at']));

        if ($request->has('tags')) {
            $post->syncTags(explode(',', $request->get('tags')));
        }

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     *
     * @return void
     */
    public function destroy(Post $post)
    {
        //
    }
}
