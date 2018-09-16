@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('pages.update', $page) }}">
        <input type="hidden" name="_method" value="PUT">
        @csrf

        @include('pages.partials.form', ['page' => $page])

    </form>
@endsection