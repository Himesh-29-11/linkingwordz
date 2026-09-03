@extends('admin.layout')

@section('title', $testimonial->exists ? 'Edit testimonial' : 'New testimonial')
@section('kicker', 'Content')
@section('heading', $testimonial->exists ? 'Edit testimonial' : 'Add testimonial')

@section('content')
    <form class="ad-form" method="post" enctype="multipart/form-data" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}">
        @csrf
        @if ($testimonial->exists) @method('PUT') @endif

        <div class="ad-form__grid">
            <div class="ad-form__main">
                <label>Context
                    <select name="context">
                        <option value="home" @selected(old('context', $testimonial->context) === 'home')>Home page</option>
                        <option value="services" @selected(old('context', $testimonial->context) === 'services')>Services page</option>
                    </select>
                </label>

                <label>Quote
                    <textarea name="quote" class="ad-rich-text" rows="5">{{ old('quote', $testimonial->quote) }}</textarea>
                </label>

                <label>Name
                    <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" required>
                </label>

                <label>Role
                    <input type="text" name="role" value="{{ old('role', $testimonial->role) }}" required>
                </label>

                <p class="ad-kicker" style="margin:1.2rem 0 0.6rem">Services page extras</p>
                <label>Intro <small>For bullet-style testimonials</small>
                    <textarea name="intro" class="ad-rich-text" rows="2">{{ old('intro', $testimonial->payload['intro'] ?? '') }}</textarea>
                </label>
                <label>Bullets <small>One per line</small>
                    <textarea name="bullets" rows="4">{{ old('bullets', isset($testimonial->payload['bullets']) ? implode("\n", $testimonial->payload['bullets']) : '') }}</textarea>
                </label>
                <label>Outro
                    <textarea name="outro" class="ad-rich-text" rows="2">{{ old('outro', $testimonial->payload['outro'] ?? '') }}</textarea>
                </label>
                <label>Meta line <small>e.g. date · Client</small>
                    <input type="text" name="meta" value="{{ old('meta', $testimonial->payload['meta'] ?? '') }}">
                </label>
            </div>
            <aside class="ad-form__side">
                <label>Sort order
                    <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $testimonial->sort_order) }}">
                </label>
                <label>Avatar <small>Home page only</small>
                    <input type="file" name="avatar" accept="image/*">
                </label>
                @if ($testimonial->avatar)
                    <img class="ad-cover" src="{{ asset($testimonial->avatar) }}" alt="">
                @endif
                <button type="submit" class="ad-btn">{{ $testimonial->exists ? 'Save changes' : 'Create testimonial' }}</button>
                <a class="ad-link" href="{{ route('admin.testimonials.index') }}">Back to list</a>
            </aside>
        </div>
    </form>
@endsection
