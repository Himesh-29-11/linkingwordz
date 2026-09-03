@extends('admin.layout')

@section('title', $item->exists ? 'Edit portfolio item' : 'New portfolio item')
@section('kicker', 'Content')
@section('heading', $item->exists ? 'Edit portfolio item' : 'Add portfolio item')

@section('content')
    <form class="ad-form" method="post" enctype="multipart/form-data" action="{{ $item->exists ? route('admin.portfolio.update', $item) : route('admin.portfolio.store') }}">
        @csrf
        @if ($item->exists) @method('PUT') @endif

        <div class="ad-form__grid">
            <div class="ad-form__main">
                <label>Client name
                    <input type="text" name="client_name" value="{{ old('client_name', $item->client_name) }}" required>
                </label>
                <label>Short summary <small>(optional)</small>
                    <textarea name="summary" rows="3" placeholder="One line about the project">{{ old('summary', $item->summary) }}</textarea>
                </label>
                <label>Website link <small>(optional)</small>
                    <input type="url" name="website_url" value="{{ old('website_url', $item->website_url) }}" placeholder="https://client-website.com">
                </label>
                <label>Upload documents <small>(PDF, Word, Excel, PowerPoint, text)</small>
                    <input type="file" name="document_files[]" accept=".pdf,.doc,.docx,.txt,.rtf,.xls,.xlsx,.ppt,.pptx" multiple>
                </label>
                @if (!empty($item->documents))
                    <div class="ad-doc-list">
                        <p><strong>Current documents</strong></p>
                        <ul>
                            @foreach ($item->documents as $index => $document)
                                <li>
                                    <label>
                                        <input type="checkbox" name="remove_documents[]" value="{{ $index }}">
                                        Remove
                                    </label>
                                    <a href="{{ asset($document['path']) }}" target="_blank" rel="noreferrer">
                                        {{ $document['label'] ?? $document['original_name'] ?? 'Document' }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <aside class="ad-form__side">
                <label>Sort order
                    <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $item->sort_order) }}">
                </label>
                <label class="ad-check">
                    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $item->is_published))>
                    Published on website
                </label>
                <label>Client photo
                    <input type="file" name="photo" accept="image/*">
                </label>
                @if ($item->photo)
                    <img class="ad-cover" src="{{ asset($item->photo) }}" alt="">
                @endif
                <button type="submit" class="ad-btn">{{ $item->exists ? 'Save changes' : 'Create portfolio item' }}</button>
                <a class="ad-link" href="{{ route('admin.portfolio.index') }}">Back to list</a>
                @if ($item->exists)
                    <a class="ad-link" href="{{ route('portfolio') }}" target="_blank" rel="noreferrer">View portfolio page ↗</a>
                @endif
            </aside>
        </div>
    </form>
@endsection
