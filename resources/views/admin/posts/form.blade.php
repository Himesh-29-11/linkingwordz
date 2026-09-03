@extends('admin.layout')

@section('title', $post->exists ? 'Edit post' : 'New post')
@section('kicker', 'Journal')
@section('heading', $post->exists ? 'Edit post' : 'Write a post')

@section('content')
    <form class="ad-form" method="post" enctype="multipart/form-data" action="{{ $post->exists ? route('admin.posts.update', $post) : route('admin.posts.store') }}">
        @csrf
        @if ($post->exists) @method('PUT') @endif

        <div class="ad-form__grid">
            <div class="ad-form__main">
                <label>Title
                    <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
                </label>
                @error('title')<p class="ad-error">{{ $message }}</p>@enderror

                <label>Excerpt
                    <textarea name="excerpt" class="ad-rich-text" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
                </label>

                <label>Body
                    <textarea name="body" class="ad-rich-text" rows="16">{{ old('body', $post->exists ? $post->bodyAsHtml() : '') }}</textarea>
                </label>

                <p class="ad-kicker" style="margin:1.2rem 0 0.6rem">SEO</p>
                <label>SEO title <small>Google tab title. Aim for under 60 characters. Leave blank to use the post title.</small>
                    <input type="text" name="seo_title" maxlength="70" value="{{ old('seo_title', $post->seo_title) }}">
                </label>
                <label>SEO description <small>The snippet under the title in Google. Aim for under 160 characters.</small>
                    <textarea name="seo_description" rows="3" maxlength="160">{{ old('seo_description', $post->seo_description) }}</textarea>
                </label>
                <label>SEO keywords <small>Comma-separated, e.g. book editing, proofreading, ghostwriting</small>
                    <input type="text" name="seo_keywords" maxlength="220" value="{{ old('seo_keywords', $post->seo_keywords) }}">
                </label>
            </div>
            <aside class="ad-form__side">
                <label>Status
                    <select name="status">
                        <option value="draft" @selected(old('status', $post->status) === 'draft')>Draft</option>
                        <option value="published" @selected(old('status', $post->status) === 'published')>Published</option>
                    </select>
                </label>
                <label>Slug
                    <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" placeholder="auto from title">
                </label>
                <label>Category
                    <input type="text" name="category" value="{{ old('category', $post->category ?: 'Blog') }}">
                </label>
                <label>Display date
                    <input type="text" name="display_date" value="{{ old('display_date', $post->display_date) }}" placeholder="Apr 16">
                </label>
                <label>Cover image
                    <input type="file" name="image" accept="image/*">
                </label>
                @if ($post->image)
                    <img class="ad-cover" src="{{ asset($post->image) }}" alt="">
                @endif
                <button type="submit" class="ad-btn">{{ $post->exists ? 'Save changes' : 'Create post' }}</button>
                <a class="ad-link" href="{{ route('admin.posts.index') }}">Back to journal</a>
            </aside>
        </div>
    </form>
@endsection
