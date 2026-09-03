@extends('admin.layout')

@section('title', 'Portfolio')
@section('kicker', 'Content')
@section('heading', 'Portfolio')

@section('content')
    <div class="ad-toolbar">
        <p>Client work shown on the public Portfolio page — photos, website links, and documents.</p>
        <a class="ad-btn" href="{{ route('admin.portfolio.create') }}">Add portfolio item</a>
    </div>

    <div class="ad-table-wrap">
        <table class="ad-table">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Links</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>
                            <strong>{{ $item->client_name }}</strong>
                            @if ($item->summary)
                                <span>{{ \Illuminate\Support\Str::limit($item->summary, 70) }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->website_url)
                                <span>Website</span>
                            @endif
                            @if (!empty($item->documents))
                                <span>{{ count($item->documents) }} doc{{ count($item->documents) === 1 ? '' : 's' }}</span>
                            @endif
                        </td>
                        <td>{{ $item->sort_order }}</td>
                        <td>{{ $item->is_published ? 'Published' : 'Hidden' }}</td>
                        <td class="ad-actions">
                            <a href="{{ route('portfolio') }}" target="_blank" rel="noreferrer">View page</a>
                            <a href="{{ route('admin.portfolio.edit', $item) }}">Edit</a>
                            <form method="post" action="{{ route('admin.portfolio.destroy', $item) }}" onsubmit="return confirm('Delete this portfolio item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">No portfolio items yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('admin.partials.pager', ['paginator' => $items])
@endsection
