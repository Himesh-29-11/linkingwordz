@extends('admin.layout')

@section('title', 'Case studies')
@section('kicker', 'Content')
@section('heading', 'Case studies')

@section('content')
    <div class="ad-toolbar">
        <p>Portfolio items shown on the Work page and homepage spotlight.</p>
        <a class="ad-btn" href="{{ route('admin.work.create') }}">Add case study</a>
    </div>

    <div class="ad-table-wrap">
        <table class="ad-table">
            <thead>
                <tr>
                    <th>Case study</th>
                    <th>Client</th>
                    <th>Order</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>
                            <strong>{{ $item->title }}</strong>
                            <span>/work/{{ $item->slug }}</span>
                        </td>
                        <td>{{ $item->client }}</td>
                        <td>{{ $item->sort_order }}</td>
                        <td class="ad-actions">
                            <a href="{{ route('work.show', $item->slug) }}" target="_blank" rel="noreferrer">View</a>
                            <a href="{{ route('admin.work.edit', $item) }}">Edit</a>
                            <form method="post" action="{{ route('admin.work.destroy', $item) }}" onsubmit="return confirm('Delete this case study?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No case studies yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('admin.partials.pager', ['paginator' => $items])
@endsection
