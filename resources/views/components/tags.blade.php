@foreach ($tags as $tag)
    <a href="{{ route('tag.posts.index', $tag) }}" class="tag is-light">{{ $tag->name }}</a>
@endforeach
