@extends('layouts.app')

@section('content')

    @auth
        @component('components.toolbar')
            <a href="{{ route('posts.create') }}" class="button is-primary">Create...</a>
        @endcomponent
    @endauth

    <div class="box m-t-50">

        @isset($tag)
            <h2 class="title is-4">Showing posts for "{{ $tag }}"</h2>
        @endisset

        @forelse($posts as $post)
            <a href="{{ action('PostsController@show', $post->slug) }}">
                <h2 class="title is-3 is-size-4-mobile">{{ $post->title }}</h2>
            </a>
            <h3 class="subtitle has-text-grey-light">
                <span class="icon"><i class="far fa-clock"></i></span>
                {{ $post->published_at->toFormattedDateString() }} |
                <span class="icon"><i class="fas fa-book-reader"></i></span>
                {{ $post->minutesToRead }} min read |
                @component('components.tags', ['tags' => $post->tags]) @endcomponent
            </h3>
            <div class="content m-b-50">{!! $post->summary !!}</div>
        @empty
            @component('components.empty')
                <h1 class="title">Nothing here.</h1>
                <h2 class="subtitle">We simply ran out of posts.</h2>
            @endcomponent
        @endforelse
    </div>

    <section class="section">
        {{ $posts->links() }}
    </section>
@endsection