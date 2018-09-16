@component('components.toolbar')
    <a href="{{ url()->previous() }}" class="button">Back</a>
    <button type="submit" accesskey="s" class="button is-primary">Save</button>
@endcomponent

<div class="field">
    <label class="label">Title</label>
    <div class="control">
        <input class="input" type="text" name="title" value="{{ $page->title }}" placeholder="Text input">
    </div>
</div>

<div class="field">
    <label class="label">Publish At</label>
    <div class="control">
        <input id="datepicker" class="input" type="date" name="published_at" value="{{ $page->published_at ? $page->published_at->format('Y-m-d') : now()->format('Y-m-d') }}">
    </div>
</div>

<div class="field">
    <label class="label">Text</label>
    <div class="control">
        <input id="text" type="hidden" name="text" value="{{ $page->text }}">
        <trix-editor input="text"></trix-editor>
    </div>
</div>
