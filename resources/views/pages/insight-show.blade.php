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
                @elseif ($type === 'html')
                    <div class="lw-post__html">{!! $text !!}</div>
                @elseif ($type === 'quote')
                    <blockquote class="lw-post__pull">{!! $text !!}</blockquote>
                @elseif (str_contains($text, '<'))
                    <div class="lw-post__html">{!! $text !!}</div>
                @else
                    <p>{{ $text }}</p>
                @endif
            @endforeach

            @include('partials.blog-engage', [
                'slug' => $insight['slug'],
                'insight' => $insight,
                'variant' => 'article',
            ])

            <div class="lw-post__cta">
                <a href="{{ route('contact') }}" class="lw-btn lw-btn--primary">Start a conversation <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
            </div>
        </div>
    </article>
@endsection
