@extends('admin.layout')

@section('title', 'Inquiry')
@section('kicker', 'Inbox')
@section('heading', $inquiry->fullName())

@section('content')
    <article class="ad-panel ad-letter">
        <p><strong>Email</strong> <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></p>
        <p><strong>Phone</strong> {{ $inquiry->phone ?: '—' }}</p>
        <p><strong>Received</strong> {{ $inquiry->created_at->format('d M Y, H:i') }}</p>
        <p class="ad-letter__body">{{ $inquiry->message }}</p>
        <form method="post" action="{{ route('admin.inquiries.update', $inquiry) }}" class="ad-inline">
            @csrf
            @method('PATCH')
            <select name="status">
                @foreach (['new','read','archived'] as $st)
                    <option value="{{ $st }}" @selected($inquiry->status === $st)>{{ $st }}</option>
                @endforeach
            </select>
            <button type="submit" class="ad-btn">Update</button>
        </form>
        <form method="post" action="{{ route('admin.inquiries.destroy', $inquiry) }}" onsubmit="return confirm('Delete this inquiry?')">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <a class="ad-link" href="{{ route('admin.inquiries.index') }}">Back to inbox</a>
    </article>
@endsection
