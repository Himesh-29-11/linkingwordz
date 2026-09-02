@extends('admin.layout')

@section('title', 'Edit page')
@section('kicker', 'Content')
@section('heading', $page->title)

@section('content')
    <form class="ad-form" method="post" action="{{ route('admin.pages.update', $page) }}">
        @csrf
        @method('PUT')

        <div class="ad-form__grid">
            <div class="ad-form__main">
                <label>Title
                    <input type="text" name="title" value="{{ old('title', $page->title) }}" required>
                </label>
                <label>Body <small>HTML allowed</small>
                    <textarea name="body" rows="24">{{ old('body', $page->body) }}</textarea>
                </label>
            </div>
            <aside class="ad-form__side">
                <p><strong>Slug:</strong> /{{ $page->slug }}</p>
                <button type="submit" class="ad-btn">Save page</button>
                <a class="ad-link" href="{{ route('admin.pages.index') }}">Back to pages</a>
            </aside>
        </div>
    </form>
@endsection
