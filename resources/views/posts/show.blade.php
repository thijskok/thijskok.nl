@extends('layouts.app')

@section('content')

    @auth
        @component('components.toolbar')
            <a href="{{ route('posts.edit', $post) }}" class="button is-primary">Edit</a>
        @endcomponent
    @endauth

    <h1 class="title is-3">{{ $post->title }}</h1>
    <h2 class="subtitle has-text-grey-light">
        <span class="icon"><i class="far fa-clock"></i></span>
        {{ $post->published_at->toFormattedDateString() }} |
        {{ $post->minutesToRead }} min read |
        @component('components.tags', ['tags' => $post->tags]) @endcomponent
    </h2>

    <p class="content">{!! $post->text !!}</p>

@endsection