@extends('layouts.app')

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

        <h1 class="title is-3 is-size-4-mobile">{{ $post->title }}</h1>
        <h2 class="subtitle has-text-grey-light">
            <span class="icon"><i class="far fa-clock"></i></span>
            {{ $post->published_at->toFormattedDateString() }} |
            <span class="icon"><i class="fas fa-book-reader"></i></span>
            {{ $post->minutesToRead }} min read |
            @component('components.tags', ['tags' => $post->tags]) @endcomponent
        </h2>

        <div class="content">{!! $post->text !!}</div>
    </div>

@endsection