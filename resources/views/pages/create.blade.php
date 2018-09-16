@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('pages.store') }}">
        @csrf

        @include('pages.partials.form', ['page' => $page])

    </form>
@endsection