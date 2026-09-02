@extends('admin.layout')

@section('title', 'Services list')
@section('kicker', 'Content')
@section('heading', 'Services list')

@section('content')
    <div class="ad-toolbar">
        <p>Audience service links used across the site.</p>
        <a class="ad-btn" href="{{ route('admin.services.create') }}">Add service</a>
    </div>

    <div class="ad-table-wrap">
        <table class="ad-table">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Audience</th>
                    <th>Order</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr>
                        <td>
                            <strong>{{ $service->title }}</strong>
                            <span>{{ $service->href }}</span>
                        </td>
                        <td>{{ $service->audience }}</td>
                        <td>{{ $service->sort_order }}</td>
                        <td class="ad-actions">
                            <a href="{{ route('admin.services.edit', $service) }}">Edit</a>
                            <form method="post" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirm('Delete this service?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No services yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('admin.partials.pager', ['paginator' => $services])
@endsection
