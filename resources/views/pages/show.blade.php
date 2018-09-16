@extends('layouts.app')

@section('title')
    {{  $page->title }}
@endsection

@section('content')

    @auth
        @component('components.toolbar')
            <a href="{{ route('pages.edit', $page) }}" class="button is-primary">Edit...</a>

            <form method="post" action="{{ route('pages.destroy', $page) }}">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button type="submit" class="button is-danger is-outlined">Delete</button>
            </form>

        @endcomponent
    @endauth

    <div class="box m-t-50">

        <!-- Title -->
        <h1 class="title is-3 is-size-4-mobile">{{ $page->title }}</h1>

        <!-- Body -->
        <div class="content">{!! $page->text !!}</div>

        <!-- Share -->
        <nav class="level">
            <div class="level-left">
                <div class="level-item">
                    @component('components.twitter', ['url' => route('pages.show', $page)])
                    @endcomponent
                </div>
            </div>
        </nav>
    </div>

@endsection