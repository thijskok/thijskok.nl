@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('posts.update', $post) }}">
        <input type="hidden" name="_method" value="PUT">
        @csrf

        @include('posts.partials.form', ['post' => $post])

    </form>
@endsection