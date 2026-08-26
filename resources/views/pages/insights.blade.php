@extends('layouts.app')

@section('title', 'Insights and Tips — LinkingWordz')

@section('content')
    <div class="lw-page lw-insights-page">
        <section class="lw-blog-intro" aria-labelledby="insights-page-title">
            <div class="lw-container lw-blog-intro__grid">
                <figure class="lw-blog-intro__photo">
                    <img src="{{ asset('images/blog/blog-hero.jpg') }}" alt="Shruti Bhatt, writer and editor at LinkingWordz">
                </figure>
                <div class="lw-blog-intro__copy">
                    <p class="lw-eyebrow">Insights and Tips</p>
                    <h1 id="insights-page-title">The LinkingWordz journal</h1>
                    <p>Here, you’ll find editing tips, writing resources, how-tos, book reviews, recommendations for tools and systems, and must-know self-publishing strategies.</p>
                    <form class="lw-blog-search" role="search" action="{{ route('insights') }}" method="get">
                        <label class="lw-visually-hidden" for="blog-search">Search</label>
                        <input id="blog-search" type="search" name="q" placeholder="Search" value="{{ request('q') }}">
                        <button type="submit" aria-label="Search posts">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="11" cy="11" r="6.5"/><path d="M16 16l5 5"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <section class="lw-ig-feed lw-section" aria-label="Blog posts">
            <div class="lw-container">
                <div class="lw-ig-feed__grid">
                    @foreach ($insights as $insight)
                        @php
                            $likes = $insight['likes'] ?? 0;
                            $comments = $insight['comments'] ?? 0;
                            $views = $insight['views'] ?? 0;
                            $date = $insight['date'] ?: 'Recently';
                        @endphp
                        <article class="lw-ig-post">
                            <header class="lw-ig-post__head">
                                <img src="{{ asset('images/shruti-founder.jpg') }}" alt="" class="lw-ig-post__avatar">
                                <div>
                                    <strong>Shruti Bhatt</strong>
                                    <span>{{ $date }}</span>
                                </div>
                                <button type="button" class="lw-ig-post__more" aria-label="More">···</button>
                            </header>
                            <a href="{{ route('insights.show', ['slug' => $insight['slug']]) }}" class="lw-ig-post__media">
                                <img src="{{ asset($insight['image']) }}" alt="{{ $insight['title'] }}">
                            </a>
                            <div class="lw-ig-post__actions" data-post-slug="{{ $insight['slug'] }}" data-likes="{{ $likes }}" data-comments="{{ $comments }}" data-views="{{ $views }}">
                                <span class="lw-ig-post__icons">
                                    <button type="button" class="lw-ig-action" data-ig-action="like" aria-pressed="false" aria-label="Like this post">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" overflow="visible" aria-hidden="true"><path d="M12.1 8.64 12 8.77l-.1-.13C10.14 6.6 7.1 6.68 5.4 8.39c-1.73 1.73-1.73 4.54 0 6.27L12 21.26l6.6-6.6c1.73-1.73 1.73-4.54 0-6.27-1.7-1.71-4.74-1.79-6.5.25z"/></svg>
                                    </button>
                                    <button type="button" class="lw-ig-action" data-ig-action="comment" aria-expanded="false" aria-controls="comments-{{ $insight['slug'] }}" aria-label="Comment on this post">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" overflow="visible" aria-hidden="true"><path d="M20 12a8 8 0 0 1-11.6 7.14L5 20l.9-3.2A8 8 0 1 1 20 12z"/></svg>
                                    </button>
                                    <button type="button" class="lw-ig-action" data-ig-action="share" aria-label="Share this post">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" overflow="visible" aria-hidden="true"><path d="M5.5 7.2 18 12 5.5 16.8V7.2z"/></svg>
                                    </button>
                                </span>
                                <button type="button" class="lw-ig-action" data-ig-action="save" aria-pressed="false" aria-label="Save this post">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" overflow="visible" aria-hidden="true"><path d="M7.5 4.5h9v15l-4.5-3-4.5 3v-15z"/></svg>
                                </button>
                            </div>
                            <p class="lw-ig-post__likes" data-ig-meta>{{ $likes }} likes · {{ $views }} views · {{ $comments }} comments</p>
                            <div class="lw-ig-comments" id="comments-{{ $insight['slug'] }}" hidden>
                                <ul class="lw-ig-comments__list" data-ig-comment-list></ul>
                                <form class="lw-ig-comments__form" data-ig-comment-form>
                                    <label class="lw-visually-hidden" for="comment-{{ $insight['slug'] }}">Add a comment</label>
                                    <input id="comment-{{ $insight['slug'] }}" type="text" name="comment" maxlength="280" placeholder="Add a comment…" required>
                                    <button type="submit">Post</button>
                                </form>
                            </div>
                            <div class="lw-ig-post__caption">
                                <p><b>shrutibhatt</b> {{ $insight['title'] }}</p>
                                <p>{{ \Illuminate\Support\Str::limit($insight['text'], 140) }}</p>
                                <a href="{{ route('insights.show', ['slug' => $insight['slug']]) }}">Read the full post</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
