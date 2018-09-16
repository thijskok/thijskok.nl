@component('components.toolbar')
    <a href="{{ url()->previous() }}" class="button">Back</a>
    <button type="submit" accesskey="s" class="button is-primary">Save</button>
@endcomponent

<div class="field">
    <label class="label">Title</label>
    <div class="control">
        <input class="input" type="text" name="title" value="{{ $post->title }}" placeholder="Text input">
    </div>
</div>

<div class="field">
    <label class="label">Tags</label>
    <div class="control">
        <input class="input" type="tags" placeholder="Add Tag" name="tags" value="{{ $post->tags->pluck('name')->implode(',') }}">
    </div>
</div>

<div class="field">
    <label class="label">Publish At</label>
    <div class="control">
        <input id="datepicker" class="input" type="date" name="published_at" value="{{ $post->published_at ? $post->published_at->format('Y-m-d') : now()->format('Y-m-d') }}">
    </div>
</div>

<div class="field">
    <label class="label">Text</label>
    <div class="control">
        <input id="text" type="hidden" name="text" value="{{ $post->text }}">
        <trix-editor input="text" class="trix-content"></trix-editor>
    </div>
</div>
