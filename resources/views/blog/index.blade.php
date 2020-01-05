@extends('blog.layouts.app')

@section('title', sprintf('%s — %s', config('app.name'), __('canvas::blog.title')))

@section('content')
    <div class="container">
        @include('blog.partials.navbar')

    <main role="main" class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if($data['posts']->count() > 0)
                    @foreach($data['posts'] as $post)
                        <div class="border-top py-4 align-items-center">
                            <h4 class="text-xs">
                                <a href="{{ route('blog.post', $post->slug) }}" class="font-serif text-dark text-decoration-none">{{ $post->title }}</a>
                            </h4>
                            <p class="text-muted mb-2">{{ $post->published_at->format('M d') }} — {{ $post->read_time }}</p>
                            <p>
                                <a href="{{ route('blog.post', $post->slug) }}" class="text-dark text-decoration-none">{{ $post->summary }}</a>
                            </p>
                        </div>
                    @endforeach

                    {{ $data['posts']->links() }}
                @else
                    <p class="mt-4">{{ __('canvas::blog.empty.description') }}
                        <a href="{{ url(sprintf('%s/posts/create', config('canvas.path'))) }}">{{ __('canvas::blog.empty.action') }}</a>.
                    </p>
                @endif
            </div>

        </div>
    </main>
@endsection
