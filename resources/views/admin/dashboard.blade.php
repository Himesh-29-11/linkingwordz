    @extends('admin.layout')

@section('title', 'Overview')
@section('kicker', 'Today')
@section('heading', 'Studio overview')

@section('content')
    <section class="ad-stats">
        @foreach ($stats as $stat)
            <article>
                <p>{{ $stat['label'] }}</p>
                <strong>{{ $stat['value'] }}</strong>
                <span>{{ $stat['hint'] }}</span>
            </article>
        @endforeach
    </section>

    <div class="ad-grid">
        <section class="ad-panel">
            <header>
                <h2>Latest posts</h2>
                <a href="{{ route('admin.posts.create') }}">New post</a>
            </header>
            <ul class="ad-list">
                @forelse ($recentPosts as $post)
                    <li>
                        <div>
                            <strong>{{ $post->title }}</strong>
                            <span>{{ $post->status }} · {{ $post->views }} views · {{ $post->likes_count }} likes</span>
                        </div>
                        <a href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                    </li>
                @empty
                    <li>No posts yet.</li>
                @endforelse
            </ul>
        </section>
        <section class="ad-panel">
            <header>
                <h2>Recent comments</h2>
                <a href="{{ route('admin.comments.index') }}">Moderate</a>
            </header>
            <ul class="ad-list">
                @forelse ($recentComments as $comment)
                    <li>
                        <div>
                            <strong>{{ $comment->author_name }}</strong>
                            <span>{{ \Illuminate\Support\Str::limit($comment->body, 90) }}</span>
                        </div>
                        <em class="ad-pill ad-pill--{{ $comment->status }}">{{ $comment->status }}</em>
                    </li>
                @empty
                    <li>No comments yet.</li>
                @endforelse
            </ul>
        </section>
        <section class="ad-panel ad-panel--wide">
            <header>
                <h2>Inquiries</h2>
                <a href="{{ route('admin.inquiries.index') }}">All messages</a>
            </header>
            <ul class="ad-list">
                @forelse ($recentInquiries as $inquiry)
                    <li>
                        <div>
                            <strong>{{ $inquiry->fullName() }}</strong>
                            <span>{{ $inquiry->email }} · {{ \Illuminate\Support\Str::limit($inquiry->message, 80) }}</span>
                        </div>
                        <a href="{{ route('admin.inquiries.show', $inquiry) }}">Open</a>
                    </li>
                @empty
                    <li>No inquiries yet.</li>
                @endforelse
            </ul>
        </section>
    </div>
@endsection
