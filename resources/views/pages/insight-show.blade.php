@extends('layouts.app')

@section('title', ($insight['seo_title'] ?? $insight['title']) . ' — LinkingWordz')
@section('meta_description', $insight['seo_description'] ?? \Illuminate\Support\Str::limit(strip_tags($insight['text'] ?? ''), 160))
@section('meta_keywords', $insight['seo_keywords'] ?? '')

@section('content')
    <article class="lw-post">
        <figure class="lw-post__cover">
            <img src="{{ asset($insight['image']) }}" alt="{{ $insight['title'] }}">
        </figure>

        <div class="lw-container lw-post__head">
            <a class="lw-post__back" href="{{ route('blog') }}">← Journal</a>
            <p class="lw-eyebrow">{{ $insight['category'] ?? 'Blog' }}</p>
            <h1>{{ $insight['title'] }}</h1>
            <p class="lw-post__byline">By Shruti Bhatt · {{ $insight['date'] ?: 'LinkingWordz' }}</p>
        </div>

        <div class="lw-container lw-post__content">
            @foreach ($insight['body'] as $block)
                @php
                    $type = is_array($block) ? ($block['type'] ?? 'p') : 'p';
                    $text = is_array($block) ? ($block['text'] ?? '') : $block;
                @endphp
                @if ($type === 'h')
                    <h2>{{ $text }}</h2>
                @elseif ($type === 'img' && !empty($block['src']))
                    @php
                        $src = $block['src'];
                        if (!str_starts_with($src, 'http')) {
                            $src = asset(ltrim($src, '/'));
                        }
                    @endphp
                    <figure class="lw-post__inline">
                        <img src="{{ $src }}" alt="{{ $block['alt'] ?? $insight['title'] }}">
                    </figure>
                @elseif ($type === 'quote')
                    <blockquote class="lw-post__pull">{{ $text }}</blockquote>
                @else
                    <p>{{ $text }}</p>
                @endif
            @endforeach

            <div class="lw-post__cta">
                <a href="{{ route('contact') }}" class="lw-btn lw-btn--primary">Start a conversation <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
            </div>

            <section class="lw-article-engage" id="comments" data-post-slug="{{ $insight['slug'] }}" data-likes="{{ $insight['likes'] ?? 0 }}" data-comments="{{ $insight['comments'] ?? 0 }}" data-shares="{{ $insight['shares'] ?? \App\Models\Post::publicCount($insight['slug'], 'shares') }}" data-views="{{ $insight['views'] ?? 0 }}">
                <div class="lw-ig-post__actions">
                    <span class="lw-ig-post__icons">
                        <button type="button" class="lw-ig-action" data-ig-action="like" aria-pressed="false" aria-label="Like this post">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M12.1 8.64 12 8.77l-.1-.13C10.14 6.6 7.1 6.68 5.4 8.39c-1.73 1.73-1.73 4.54 0 6.27L12 21.26l6.6-6.6c1.73-1.73 1.73-4.54 0-6.27-1.7-1.71-4.74-1.79-6.5.25z"/></svg>
                        </button>
                        <button type="button" class="lw-ig-action" data-ig-action="comment" aria-expanded="true" aria-label="Comment on this post">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M20 12a8 8 0 0 1-11.6 7.14L5 20l.9-3.2A8 8 0 1 1 20 12z"/></svg>
                        </button>
                        <button type="button" class="lw-ig-action" data-ig-action="share" aria-label="Share this post">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M5.5 7.2 18 12 5.5 16.8V7.2z"/></svg>
                        </button>
                    </span>
                    <button type="button" class="lw-ig-action" data-ig-action="save" aria-pressed="false" aria-label="Save this post">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M7.5 4.5h9v15l-4.5-3-4.5 3v-15z"/></svg>
                    </button>
                </div>
                <p class="lw-ig-post__likes" data-ig-meta>{{ $insight['likes'] ?? 0 }} likes · {{ $insight['comments'] ?? 0 }} comments · {{ $insight['shares'] ?? 0 }} shares</p>
                <div class="lw-ig-comments is-open">
                    <h2>Comments</h2>
                    <ul class="lw-ig-comments__list" data-ig-comment-list></ul>
                    <form class="lw-ig-comments__form" data-ig-comment-form>
                        <label class="lw-visually-hidden" for="article-comment">Add a comment</label>
                        <input id="article-comment" type="text" name="comment" maxlength="280" placeholder="Add a comment…" required>
                        <button type="submit">Post</button>
                    </form>
                </div>
            </section>
        </div>
    </article>
@endsection
