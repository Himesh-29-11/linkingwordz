@extends('admin.layout')

@section('title', 'Comments')
@section('kicker', 'Community')
@section('heading', 'Comments')

@section('content')
    <div class="ad-toolbar">
        <nav class="ad-filters">
            @foreach (['all' => 'All', 'pending' => 'Pending', 'approved' => 'Approved', 'spam' => 'Spam'] as $key => $label)
                <a href="{{ route('admin.comments.index', ['status' => $key]) }}" class="{{ $status === $key ? 'is-on' : '' }}">{{ $label }}</a>
            @endforeach
        </nav>
    </div>

    <div class="ad-table-wrap">
        <table class="ad-table">
            <thead>
                <tr>
                    <th>Comment</th>
                    <th>Post</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comments as $comment)
                    <tr>
                        <td>
                            <strong>{{ $comment->author_name }}</strong>
                            <span>{{ $comment->body }}</span>
                        </td>
                        <td>{{ $comment->post?->title }}</td>
                        <td><em class="ad-pill ad-pill--{{ $comment->status }}">{{ $comment->status }}</em></td>
                        <td class="ad-actions">
                            <form method="post" action="{{ route('admin.comments.update', $comment) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" @disabled($comment->status === 'approved')>Approve</button>
                            </form>
                            <form method="post" action="{{ route('admin.comments.update', $comment) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="pending">
                                <button type="submit" @disabled($comment->status === 'pending')>Hold</button>
                            </form>
                            <form method="post" action="{{ route('admin.comments.update', $comment) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="spam">
                                <button type="submit" @disabled($comment->status === 'spam')>Spam</button>
                            </form>
                            <form method="post" action="{{ route('admin.comments.destroy', $comment) }}" onsubmit="return confirm('Remove this comment?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No comments in this view.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('admin.partials.pager', ['paginator' => $comments])
@endsection
