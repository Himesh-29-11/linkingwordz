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
                            <div class="lw-ig-post__actions" aria-hidden="true">
                                <span class="lw-ig-post__icons">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 20s-7-4.4-9.2-8.2C1 8.8 2.4 5.5 6 5.2c2-.2 3.5.9 4.4 2.2C11.3 6.1 12.8 5 14.8 5.2c3.6.3 5 3.6 3.2 6.6C19 15.6 12 20 12 20z"/></svg>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 18.5 5 21l4-2.2A9 9 0 1 0 6 18.5z"/></svg>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 6.5 19 12 5 17.5V6.5z"/></svg>
                                </span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M7 4h10v16l-5-3.2L7 20V4z"/></svg>
                            </div>
                            <p class="lw-ig-post__likes">{{ $likes }} likes · {{ $views }} views · {{ $comments }} comments</p>
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
