@extends('admin.layout')

@section('title', $service->exists ? 'Edit service' : 'New service')
@section('kicker', 'Content')
@section('heading', $service->exists ? 'Edit service' : 'Add service')

@section('content')
    <form class="ad-form" method="post" action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}">
        @csrf
        @if ($service->exists) @method('PUT') @endif

        <div class="ad-form__grid">
            <div class="ad-form__main">
                <label>Title
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required>
                </label>
                <label>Audience
                    <select name="audience">
                        <option value="Authors" @selected(old('audience', $service->audience) === 'Authors')>Authors</option>
                        <option value="Brands" @selected(old('audience', $service->audience) === 'Brands')>Brands</option>
                    </select>
                </label>
                <label>Link URL
                    <input type="text" name="href" value="{{ old('href', $service->href) }}" required>
                </label>
            </div>
            <aside class="ad-form__side">
                <label>Sort order
                    <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $service->sort_order) }}">
                </label>
                <button type="submit" class="ad-btn">{{ $service->exists ? 'Save changes' : 'Create service' }}</button>
                <a class="ad-link" href="{{ route('admin.services.index') }}">Back to list</a>
            </aside>
        </div>
    </form>
@endsection
