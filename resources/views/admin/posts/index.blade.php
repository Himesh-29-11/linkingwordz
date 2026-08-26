@extends('admin.layout')

@section('title', 'Journal')
@section('kicker', 'Content')
@section('heading', 'Journal posts')

@section('content')
    <div class="ad-toolbar">
        <form method="get">
            <input type="search" name="q" value="{{ $q }}" placeholder="Search title, slug, category">
            <button type="submit">Search</button>
        </form>
        <a class="ad-btn" href="{{ route('admin.posts.create') }}">Write a post</a>
    </div>

    <div class="ad-table-wrap">
        <table class="ad-table">
            <thead>
                <tr>
                    <th>Post</th>
                    <th>Status</th>
                    <th>Engagement</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>
                            <strong>{{ $post->title }}</strong>
                            <span>/blog/{{ $post->slug }}</span>
                        </td>
                        <td><em class="ad-pill ad-pill--{{ $post->status }}">{{ $post->status }}</em></td>
                        <td>{{ $post->views }} views · {{ $post->likes_count }} likes · {{ $post->comments()->count() }} comments</td>
                        <td class="ad-actions">
                            <a href="{{ route('blog.show', $post->slug) }}" target="_blank" rel="noreferrer">View</a>
                            <a href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                            <form method="post" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No posts match that search.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $posts->links() }}
@endsection
