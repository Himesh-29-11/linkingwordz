@extends('admin.layout')

@section('title', 'Pages')
@section('kicker', 'Content')
@section('heading', 'Site pages')

@section('content')
    <div class="ad-table-wrap">
        <table class="ad-table">
            <thead>
                <tr>
                    <th>Page</th>
                    <th>Slug</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pages as $page)
                    <tr>
                        <td><strong>{{ $page->title }}</strong></td>
                        <td>/{{ $page->slug }}</td>
                        <td class="ad-actions">
                            <a href="{{ route('admin.pages.edit', $page) }}">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">No pages seeded yet. Run the CMS seeder.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
