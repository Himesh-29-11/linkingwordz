@extends('admin.layout')

@section('title', 'Pages')
@section('kicker', 'Content')
@section('heading', 'Site pages')

@section('content')
    <div class="ad-toolbar">
        <p>Edit every section of the Home, About, Contact, and Services pages — including images for each section.</p>
    </div>

    <div class="ad-table-wrap">
        <table class="ad-table">
            <thead>
                <tr>
                    <th>Page</th>
                    <th>URL</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pages as $page)
                    <tr>
                        <td><strong>{{ $page->title }}</strong></td>
                        <td>{{ \App\Support\PageSectionDefaults::publicPath($page->slug) }}</td>
                        <td class="ad-actions">
                            @if ($route = \App\Support\PageSectionDefaults::publicRoute($page->slug))
                                <a href="{{ route($route) }}" target="_blank" rel="noreferrer">View</a>
                            @elseif (! in_array($page->slug, ['privacy-policy', 'terms-and-conditions'], true))
                                <a href="{{ url(\App\Support\PageSectionDefaults::publicPath($page->slug)) }}" target="_blank" rel="noreferrer">View</a>
                            @endif
                            <a href="{{ route('admin.pages.edit', $page) }}">Edit sections</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">No pages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
