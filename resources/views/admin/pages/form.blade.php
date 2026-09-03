@extends('admin.layout')

@section('title', 'Edit page')
@section('kicker', 'Content')
@section('heading', $page->title)

@section('content')
    <form class="ad-form" method="post" enctype="multipart/form-data" action="{{ route('admin.pages.update', $page) }}">
        @csrf
        @method('PUT')

        @if (in_array($page->slug, ['privacy-policy', 'terms-and-conditions'], true))
            <div class="ad-form__grid">
                <div class="ad-form__main">
                    <label>Title
                        <input type="text" name="title" value="{{ old('title', $page->title) }}" required>
                    </label>
                    <label>Body
                        <textarea name="body" class="ad-rich-text" rows="24">{{ old('body', $page->body) }}</textarea>
                    </label>
                </div>
                <aside class="ad-form__side">
                    <p><strong>Slug:</strong> /{{ $page->slug }}</p>
                    <button type="submit" class="ad-btn">Save page</button>
                    <a class="ad-link" href="{{ route('admin.pages.index') }}">Back to pages</a>
                </aside>
            </div>
        @else
            <div class="ad-page-sections">
                @foreach ($schema as $section)
                    @php($sectionId = $section['id'])
                    @php($sectionData = $sections[$sectionId] ?? [])
                    <details class="ad-page-section" open>
                        <summary>{{ $section['label'] }}</summary>
                        <div class="ad-page-section__body">
                            @foreach ($section['fields'] as $field)
                                @php($fieldKey = $field['key'])
                                @php($value = old("sections.{$sectionId}.{$fieldKey}", $sectionData[$fieldKey] ?? ''))

                                @if ($field['type'] === 'image')
                                    <label>{{ $field['label'] }}
                                        <input type="file" name="section_files[{{ $sectionId }}][{{ $fieldKey }}]" accept="image/*">
                                    </label>
                                    @if (!empty($value))
                                        <img class="ad-cover" src="{{ asset($value) }}" alt="">
                                    @endif
                                @elseif ($field['type'] === 'textarea')
                                    <label>{{ $field['label'] }}
                                        <textarea name="sections[{{ $sectionId }}][{{ $fieldKey }}]" rows="4">{{ $value }}</textarea>
                                    </label>
                                @elseif ($field['type'] === 'html')
                                    <label>{{ $field['label'] }}
                                        <textarea name="sections[{{ $sectionId }}][{{ $fieldKey }}]" class="ad-rich-text" rows="6">{{ $value }}</textarea>
                                    </label>
                                @else
                                    <label>{{ $field['label'] }}
                                        <input type="text" name="sections[{{ $sectionId }}][{{ $fieldKey }}]" value="{{ $value }}">
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    </details>
                @endforeach
            </div>

            <div class="ad-page-actions">
                <button type="submit" class="ad-btn">Save all sections</button>
                <a class="ad-link" href="{{ route('admin.pages.index') }}">Back to pages</a>
                @if ($route = \App\Support\PageSectionDefaults::publicRoute($page->slug))
                    <a class="ad-link" href="{{ route($route) }}" target="_blank" rel="noreferrer">View page ↗</a>
                @else
                    <a class="ad-link" href="{{ url(\App\Support\PageSectionDefaults::publicPath($page->slug)) }}" target="_blank" rel="noreferrer">View page ↗</a>
                @endif
            </div>
        @endif
    </form>
@endsection
