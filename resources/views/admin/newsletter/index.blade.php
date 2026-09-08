@extends('admin.layout')

@section('title', 'Newsletter')
@section('kicker', 'Audience')
@section('heading', 'Newsletter subscribers')

@section('content')
    <div class="ad-toolbar">
        <p>People who subscribed via the footer form.</p>
        <a class="ad-btn" href="{{ route('admin.newsletter.export') }}">Export CSV</a>
    </div>

    <div class="ad-table-wrap">
        <table class="ad-table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Subscribed</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($subscribers as $subscriber)
                    <tr>
                        <td><strong>{{ $subscriber->email }}</strong></td>
                        <td>{{ optional($subscriber->created_at)->format('j M Y, g:i A') }}</td>
                        <td class="ad-actions">
                            <form method="post" action="{{ route('admin.newsletter.destroy', $subscriber) }}" onsubmit="return confirm('Remove this subscriber?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ad-link">Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">No subscribers yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('admin.partials.pager', ['paginator' => $subscribers])
@endsection
