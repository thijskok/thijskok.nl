@extends('layouts.app')

@section('title')
    {{  $post->title }}
@endsection

@section('content')

    @auth
        @component('components.toolbar')
            <a href="{{ route('posts.edit', $post) }}" class="button is-primary">Edit...</a>

            <form method="post" action="{{ route('posts.destroy', $post) }}">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button type="submit" class="button is-danger is-outlined">Delete</button>
            </form>

        @endcomponent
    @endauth

    <div class="box m-t-50">

        <!-- Title -->
        <h1 class="title is-3 is-size-4-mobile">{{ $post->title }}</h1>
        <h2 class="subtitle has-text-grey-light">
            <span class="icon"><i class="far fa-clock"></i></span>
            {{ $post->published_at->toFormattedDateString() }} |
            <span class="icon"><i class="fas fa-book-reader"></i></span>
            {{ $post->minutesToRead }} min read |
            @component('components.tags', ['tags' => $post->tags]) @endcomponent
        </h2>

        <!-- Body -->
        <div class="content">{!! $post->text !!}</div>

        <!-- Share -->
        <nav class="level">
            <div class="level-left">
                <div class="level-item">
                    @component('components.twitter', ['url' => route('posts.show', $post)])
                    @endcomponent
                </div>
            </div>
        </nav>
    </div>

@endsection