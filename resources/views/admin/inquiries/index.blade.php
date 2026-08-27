@extends('admin.layout')

@section('title', 'Inquiries')
@section('kicker', 'Inbox')
@section('heading', 'Contact inquiries')

@section('content')
    <div class="ad-table-wrap">
        <table class="ad-table">
            <thead>
                <tr>
                    <th>From</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($inquiries as $inquiry)
                    <tr>
                        <td>
                            <strong>{{ $inquiry->fullName() }}</strong>
                            <span>{{ $inquiry->email }}@if($inquiry->phone) · {{ $inquiry->phone }}@endif</span>
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($inquiry->message, 120) }}</td>
                        <td><em class="ad-pill ad-pill--{{ $inquiry->status }}">{{ $inquiry->status }}</em></td>
                        <td class="ad-actions">
                            <a href="{{ route('admin.inquiries.show', $inquiry) }}">Open</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No inquiries yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('admin.partials.pager', ['paginator' => $inquiries])
@endsection
