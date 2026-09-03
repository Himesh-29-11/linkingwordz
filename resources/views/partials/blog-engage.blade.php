@php
    $likes = $likes ?? ($insight['likes'] ?? \App\Models\Post::publicCount($slug, 'likes'));
    $comments = $comments ?? ($insight['comments'] ?? \App\Models\Post::publicCount($slug, 'comments'));
    $shares = $shares ?? ($insight['shares'] ?? \App\Models\Post::publicCount($slug, 'shares'));
    $views = $views ?? ($insight['views'] ?? 0);
    $isArticle = ($variant ?? 'card') === 'article';
@endphp

<section class="{{ $isArticle ? 'lw-article-engage' : 'lw-ig-post__engage' }}" @if ($isArticle) aria-label="Post reactions" @endif>
    <div class="{{ $isArticle ? 'lw-talk__bar' : '' }}">
        <div
            class="lw-ig-post__actions"
            data-post-slug="{{ $slug }}"
            data-likes="{{ $likes }}"
            data-comments="{{ $comments }}"
            data-shares="{{ $shares }}"
            data-views="{{ $views }}"
        >
            <span class="lw-ig-post__icons">
                <button type="button" class="lw-ig-action" data-ig-action="like" aria-pressed="false" aria-label="Like this post">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" overflow="visible" aria-hidden="true"><path d="M12.1 8.64 12 8.77l-.1-.13C10.14 6.6 7.1 6.68 5.4 8.39c-1.73 1.73-1.73 4.54 0 6.27L12 21.26l6.6-6.6c1.73-1.73 1.73-4.54 0-6.27-1.7-1.71-4.74-1.79-6.5.25z"/></svg>
                </button>
                <button type="button" class="lw-ig-action" data-ig-action="comment" aria-expanded="{{ $isArticle ? 'true' : 'false' }}" aria-controls="comments-{{ $slug }}" aria-label="Comment on this post">
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
        <p class="{{ $isArticle ? 'lw-talk__meta' : 'lw-ig-post__likes' }}" data-ig-meta>{{ $likes }} likes · {{ $comments }} comments · {{ $shares }} shares</p>
    </div>

    <div class="lw-ig-comments {{ $isArticle ? 'is-open lw-talk' : '' }}" id="comments-{{ $slug }}" @if (! $isArticle) hidden @endif>
        @if ($isArticle)
            <div class="lw-talk__head">
                <p class="lw-eyebrow">Discussion</p>
                <h2>Join the conversation</h2>
            </div>
            <ul class="lw-talk__list" data-ig-comment-list></ul>
            <form class="lw-talk__form" data-ig-comment-form>
                <span class="lw-talk__avatar" aria-hidden="true">Y</span>
                <label class="lw-visually-hidden" for="comment-{{ $slug }}">Add a comment</label>
                <textarea id="comment-{{ $slug }}" name="comment" maxlength="280" placeholder="Share your thoughts…" required></textarea>
                <button type="submit">Post</button>
            </form>
        @else
            <ul class="lw-ig-comments__list" data-ig-comment-list></ul>
            <form class="lw-ig-comments__form" data-ig-comment-form>
                <label class="lw-visually-hidden" for="comment-{{ $slug }}">Add a comment</label>
                <input id="comment-{{ $slug }}" type="text" name="comment" maxlength="280" placeholder="Add a comment…" required>
                <button type="submit">Post</button>
            </form>
        @endif
    </div>
</section>
