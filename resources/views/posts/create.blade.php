@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('posts.store') }}">
        @csrf

        @include('posts.partials.form', ['post' => $post])

    </form>
@endsection