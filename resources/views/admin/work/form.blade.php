@extends('admin.layout')

@section('title', $item->exists ? 'Edit case study' : 'New case study')
@section('kicker', 'Content')
@section('heading', $item->exists ? 'Edit case study' : 'Add case study')

@section('content')
    <form class="ad-form" method="post" enctype="multipart/form-data" action="{{ $item->exists ? route('admin.work.update', $item) : route('admin.work.store') }}">
        @csrf
        @if ($item->exists) @method('PUT') @endif

        <div class="ad-form__grid">
            <div class="ad-form__main">
                <label>Title
                    <input type="text" name="title" value="{{ old('title', $item->title) }}" required>
                </label>
                <label>Slug
                    <input type="text" name="slug" value="{{ old('slug', $item->slug) }}" placeholder="auto from title">
                </label>
                <label>Short summary
                    <input type="text" name="text" value="{{ old('text', $item->text) }}">
                </label>
                <label>Result line
                    <input type="text" name="result" value="{{ old('result', $item->result) }}">
                </label>
                <label>Full story
                    <textarea name="body" class="ad-rich-text" rows="12">{{ old('body', $item->body) }}</textarea>
                </label>
            </div>
            <aside class="ad-form__side">
                <label>Category
                    <input type="text" name="category" value="{{ old('category', $item->category) }}">
                </label>
                <label>Client name
                    <input type="text" name="client" value="{{ old('client', $item->client) }}">
                </label>
                <label>Client role
                    <input type="text" name="role" value="{{ old('role', $item->role) }}">
                </label>
                <label>Sort order
                    <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $item->sort_order) }}">
                </label>
                <label>Cover image
                    <input type="file" name="image" accept="image/*">
                </label>
                @if ($item->image)
                    <img class="ad-cover" src="{{ asset($item->image) }}" alt="">
                @endif
                <button type="submit" class="ad-btn">{{ $item->exists ? 'Save changes' : 'Create case study' }}</button>
                <a class="ad-link" href="{{ route('admin.work.index') }}">Back to list</a>
            </aside>
        </div>
    </form>
@endsection
