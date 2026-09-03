@extends('layouts.app')

@section('title', 'About Shruti Bhatt — LinkingWordz')

@section('content')
    @php
        $hero = $sections['hero'] ?? [];
        $journey = $sections['journey'] ?? [];
        $work = $sections['work'] ?? [];
        $know = $sections['know'] ?? [];
        $genres = $sections['genres'] ?? [];
        $instagram = $sections['instagram'] ?? [];
        $cta = $sections['cta'] ?? [];
    @endphp
    <div class="lw-page lw-about-page">
        <section class="lw-abx-hero" aria-labelledby="about-title">
            <div class="lw-abx-hero__media">
                <img class="lw-abx-hero__bg" src="{{ asset($hero['image'] ?? 'images/shruti-hero.jpg') }}" alt="" aria-hidden="true">
            </div>
            <div class="lw-abx-hero__portrait-wrap">
                <img class="lw-abx-hero__portrait" src="{{ asset($hero['image'] ?? 'images/shruti-hero.jpg') }}" alt="Shruti Bhatt">
            </div>
            <div class="lw-container">
                <div class="lw-abx-hero__card">
                    <p class="lw-eyebrow">{{ $hero['eyebrow'] ?? '' }}</p>
                    <h1 id="about-title">{{ $hero['title'] ?? '' }}</h1>
                    <p>{{ $hero['text'] ?? '' }}</p>
                    <p class="lw-abx-hero__role">{{ $hero['role'] ?? '' }}</p>
                    <a href="{{ route('contact') }}" class="lw-btn lw-btn--primary">Let's Chat! <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                </div>
                <ul class="lw-abx-hero__chips">
                    <li><span class="lw-abx-hero__chip-icon">@include('partials.publisher-icon', ['name' => 'book'])</span><b>{{ $hero['chip_1'] ?? '' }}</b></li>
                    <li><span class="lw-abx-hero__chip-icon">@include('partials.publisher-icon', ['name' => 'edit'])</span><b>{{ $hero['chip_2'] ?? '' }}</b></li>
                    <li><span class="lw-abx-hero__chip-icon">@include('partials.publisher-icon', ['name' => 'spark'])</span><b>{{ $hero['chip_3'] ?? '' }}</b></li>
                    <li><span class="lw-abx-hero__chip-icon">@include('partials.publisher-icon', ['name' => 'chat'])</span><b>{{ $hero['chip_4'] ?? '' }}</b></li>
                </ul>
            </div>
        </section>

        <section class="lw-abx-story lw-has-rings" aria-labelledby="journey-title">
            <div class="lw-container lw-abx-story__grid">
                <figure class="lw-abx-story__portrait">
                    <img src="{{ asset($journey['image'] ?? 'images/about/about-grammar.jpg') }}" alt="Shruti Bhatt">
                </figure>
                <div class="lw-abx-story__copy">
                    <p class="lw-eyebrow">{{ $journey['eyebrow'] ?? '' }}</p>
                    <h2 id="journey-title">{{ $journey['title'] ?? '' }}</h2>
                    <p>{{ $journey['text_1'] ?? '' }}</p>
                    <p>{{ $journey['text_2'] ?? '' }}</p>
                    <p>{{ $journey['text_3'] ?? '' }}</p>
                    <p>{{ $journey['text_4'] ?? '' }}</p>
                    <p>{{ $journey['text_5'] ?? '' }}</p>
                </div>
            </div>
        </section>

        <section class="lw-abx-work lw-has-rings" aria-labelledby="work-title">
            <div class="lw-container lw-abx-work__grid">
                <div>
                    <p class="lw-eyebrow">{{ $work['eyebrow'] ?? '' }}</p>
                    <h2 id="work-title">{{ $work['title'] ?? '' }}</h2>
                    <p>{{ $work['text_1'] ?? '' }}</p>
                    <p class="lw-abx-pull">{{ $work['pull_quote'] ?? '' }}</p>
                    <p>{{ $work['text_2'] ?? '' }}</p>
                    <p>{{ $work['text_3'] ?? '' }}</p>
                </div>
                <figure>
                    <img src="{{ asset($work['image'] ?? 'images/about/about-desk.jpeg') }}" alt="Shruti working on a manuscript at her laptop">
                </figure>
            </div>
        </section>

        <section class="lw-abx-know" aria-labelledby="know-title">
            <div class="lw-abx-know__wash" aria-hidden="true"></div>
            <div class="lw-container">
                <h2 id="know-title">{{ $know['title'] ?? '' }}</h2>
                <div class="lw-abx-know__phones">
                    <figure><img src="{{ asset($know['image_1'] ?? 'images/about/about-ig-1.png') }}" alt="Get to know Me"></figure>
                    <figure><img src="{{ asset($know['image_2'] ?? 'images/about/about-ig-2.png') }}" alt="Get to know Me"></figure>
                    <figure><img src="{{ asset($know['image_3'] ?? 'images/about/about-ig-3.png') }}" alt="Get to know Me"></figure>
                </div>
            </div>
        </section>

        <section class="lw-abx-genres lw-has-rings" aria-labelledby="genres-title">
            <div class="lw-container">
                <h2 id="genres-title">{{ $genres['title'] ?? '' }}</h2>
                <div class="lw-abx-genres__grid">
                    <article>
                        <h3>Non-fiction:</h3>
                        <ul>
                            @foreach (preg_split('/\r\n|\r|\n/', $genres['nonfiction'] ?? '') as $item)
                                @if (trim($item) !== '')<li>{{ trim($item) }}</li>@endif
                            @endforeach
                        </ul>
                    </article>
                    <article>
                        <h3>Fiction:</h3>
                        <ul>
                            @foreach (preg_split('/\r\n|\r|\n/', $genres['fiction'] ?? '') as $item)
                                @if (trim($item) !== '')<li>{{ trim($item) }}</li>@endif
                            @endforeach
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <section class="lw-abx-posts" aria-labelledby="posts-title" data-ig-carousel>
            <div class="lw-container">
                <div class="lw-ig-carousel__head">
                    <h2 id="posts-title">{{ $instagram['title'] ?? '' }}</h2>
                    <div class="lw-ig-carousel__tools">
                        <button type="button" class="lw-ig-carousel__nav" data-ig-prev aria-label="Previous posts">‹</button>
                        <button type="button" class="lw-ig-carousel__nav" data-ig-next aria-label="Next posts">›</button>
                    </div>
                </div>
                <div class="lw-ig-carousel" aria-roledescription="carousel">
                    <div class="lw-ig-carousel__viewport">
                        <div class="lw-ig-carousel__track">
                            @foreach ($instagramPosts as $post)
                                <article class="lw-ig-carousel__slide">
                                    @if (($post['type'] ?? 'image') === 'video')
                                        <div class="lw-abx-posts__reel">
                                            <video src="{{ asset($post['src']) }}" poster="{{ asset($post['poster'] ?? '') }}" controls playsinline preload="metadata" title="{{ $post['alt'] }}"></video>
                                            <span class="lw-abx-posts__play" aria-hidden="true"></span>
                                        </div>
                                    @else
                                        <a href="{{ $post['href'] }}" target="_blank" rel="noreferrer">
                                            <img src="{{ asset($post['src']) }}" alt="{{ $post['alt'] }}">
                                        </a>
                                    @endif
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="lw-ig-carousel__dots" data-ig-dots role="tablist" aria-label="Instagram pages"></div>
                <p class="lw-ig-carousel__more">
                    <a href="https://www.instagram.com/linkingwordz/" target="_blank" rel="noreferrer">See every post on Instagram ↗</a>
                </p>
            </div>
        </section>

        <section class="lw-final-cta" aria-labelledby="about-cta-title">
            <div class="lw-container lw-final-cta__inner">
                <span class="lw-final-cta__icon" aria-hidden="true">@include('partials.publisher-icon', ['name' => 'chat'])</span>
                <div class="lw-final-cta__copy">
                    <h2 id="about-cta-title">{{ $cta['title'] ?? '' }}</h2>
                    <p>{{ $cta['text'] ?? '' }}</p>
                </div>
                <div class="lw-final-cta__actions">
                    <a href="{{ route('contact') }}" class="lw-btn lw-btn--secondary">Let's Chat! <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                </div>
            </div>
        </section>
    </div>
@endsection
