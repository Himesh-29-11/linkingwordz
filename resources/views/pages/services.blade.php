@extends('layouts.app')

@section('title', 'Services — LinkingWordz')

@section('content')
    @php
        use App\Support\PageSectionDefaults;

        $hero = $sections['hero'] ?? [];
        $journey = $sections['journey'] ?? [];
        $different = $sections['different'] ?? [];
        $clarity = $sections['clarity'] ?? [];
        $framework = $sections['framework'] ?? [];
        $paths = $sections['paths'] ?? [];
        $testimonialsHeader = $sections['testimonials'] ?? [];
        $problems = PageSectionDefaults::parseLines($journey['problems'] ?? '');
        $differentCards = PageSectionDefaults::parsePipeCards($different['items'] ?? '');
        $frameworkCards = PageSectionDefaults::parsePipeCards($framework['cards'] ?? '');
        $authorsItems = PageSectionDefaults::parseLines($paths['authors_items'] ?? '');
        $brandsItems = PageSectionDefaults::parseLines($paths['brands_items'] ?? '');
        $serviceBlocks = [
            ['key' => 'block_website', 'anchor' => 'website', 'alt' => false, 'asideLink' => false],
            ['key' => 'block_blogs', 'anchor' => 'blogs', 'alt' => true, 'asideLink' => false],
            ['key' => 'block_linkedin', 'anchor' => 'linkedin', 'alt' => false, 'asideLink' => false],
            ['key' => 'block_book', 'anchor' => 'book', 'alt' => true, 'asideLink' => true],
            ['key' => 'block_editorial', 'anchor' => 'editorial', 'alt' => false, 'asideLink' => true],
        ];
    @endphp
    <div class="lw-page lw-svc">
        <header class="lw-svc-hero">
            @include('partials.ornament')
            <div class="lw-container lw-svc-hero__inner">
                <div class="lw-svc-hero__copy">
                    <p class="lw-eyebrow">{{ $hero['eyebrow'] ?? 'Services' }}</p>
                    <h1>{{ $hero['title'] ?? '' }}</h1>
                    <p>{{ $hero['intro_1'] ?? '' }}</p>
                    <p>{{ $hero['intro_2'] ?? '' }}</p>
                    <div class="lw-svc-hero__actions">
                        <a class="lw-btn lw-btn--primary" href="{{ $hero['cta_url'] ?? 'https://calendly.com/linkingwordz/30min' }}" target="_blank" rel="noreferrer">{{ $hero['cta_label'] ?? 'Book a free discovery call' }}</a>
                        <span>{{ $hero['cta_note'] ?? '' }}</span>
                    </div>
                </div>
                <ul class="lw-fill-tiles">
                    <li><span>@include('partials.publisher-icon', ['name' => 'website'])</span><b>01</b><em>Website</em></li>
                    <li><span>@include('partials.publisher-icon', ['name' => 'article'])</span><b>02</b><em>Blogs</em></li>
                    <li><span>@include('partials.publisher-icon', ['name' => 'linkedin'])</span><b>03</b><em>LinkedIn</em></li>
                    <li><span>@include('partials.publisher-icon', ['name' => 'book'])</span><b>04</b><em>Book</em></li>
                    <li><span>@include('partials.publisher-icon', ['name' => 'edit'])</span><b>05</b><em>Editorial</em></li>
                    <li><span>@include('partials.publisher-icon', ['name' => 'spark'])</span><b>+</b><em>Human-written</em></li>
                </ul>
            </div>
        </header>

        <section class="lw-svc-journey">
            <div class="lw-container">
                <p class="lw-eyebrow">{{ $journey['eyebrow'] ?? '' }}</p>
                <h2>{{ $journey['title'] ?? '' }}</h2>
                <ol class="lw-svc-problems">
                    @foreach ($problems as $problem)
                        <li>{{ $problem }}</li>
                    @endforeach
                </ol>
            </div>
        </section>

        @foreach ($serviceBlocks as $serviceBlock)
            @include('partials.services-block', [
                'block' => $sections[$serviceBlock['key']] ?? [],
                'anchor' => $serviceBlock['anchor'],
                'alt' => $serviceBlock['alt'],
                'asideLink' => $serviceBlock['asideLink'],
            ])
        @endforeach

        <section class="lw-svc-block lw-svc-block--alt">
            <div class="lw-container">
                <p class="lw-eyebrow">{{ $different['eyebrow'] ?? '' }}</p>
                <h2>{{ $different['title'] ?? '' }}</h2>
                <div class="lw-svc-subjects">
                    @foreach ($differentCards as $card)
                        <article>
                            <h3>{{ $card['title'] }}</h3>
                            <p>{{ $card['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="lw-svc-gap">
            <div class="lw-container">
                <p class="lw-eyebrow">{{ $clarity['eyebrow'] ?? '' }}</p>
                <h2>{{ $clarity['title'] ?? '' }}</h2>
                <div class="lw-svc-split">
                    <article>
                        <h3>{{ $clarity['marketing_title'] ?? '' }}</h3>
                        <p>{{ $clarity['marketing_text'] ?? '' }}</p>
                    </article>
                    <article>
                        <h3>{{ $clarity['pr_title'] ?? '' }}</h3>
                        <p>{{ $clarity['pr_text'] ?? '' }}</p>
                    </article>
                </div>
                <p class="lw-svc-pull">{{ $clarity['pull_quote'] ?? '' }}</p>
            </div>
        </section>

        <section class="lw-svc-journey">
            <div class="lw-container">
                <p class="lw-eyebrow">{{ $framework['eyebrow'] ?? '' }}</p>
                <h2>{{ $framework['title'] ?? '' }}</h2>
                <p class="lw-svc-lede">{{ $framework['lede'] ?? '' }}</p>
                <div class="lw-svc-trio">
                    @foreach ($frameworkCards as $card)
                        <article>
                            <h3>{{ $card['title'] }}</h3>
                            <p>{{ $card['text'] }}</p>
                        </article>
                    @endforeach
                </div>
                <p class="lw-svc-aside">{{ $framework['aside'] ?? '' }}</p>
            </div>
        </section>

        <section class="lw-svc-paths">
            <div class="lw-container">
                <p class="lw-eyebrow">{{ $paths['eyebrow'] ?? '' }}</p>
                <div class="lw-svc-paths__grid" style="margin-top:1.5rem">
                    <article class="lw-svc-path lw-svc-path--teal">
                        <h2>{{ $paths['authors_title'] ?? '' }}</h2>
                        <p>{{ $paths['authors_text'] ?? '' }}</p>
                        <ul>
                            @foreach ($authorsItems as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('services.authors') }}" class="lw-btn lw-btn--light">{{ $paths['authors_btn'] ?? 'See full details' }} <span aria-hidden="true">→</span></a>
                    </article>
                    <article class="lw-svc-path lw-svc-path--mauve">
                        <h2>{{ $paths['brands_title'] ?? '' }}</h2>
                        <p>{{ $paths['brands_text'] ?? '' }}</p>
                        <ul>
                            @foreach ($brandsItems as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('services.brands') }}" class="lw-btn lw-btn--light">{{ $paths['brands_btn'] ?? 'See full details' }} <span aria-hidden="true">→</span></a>
                    </article>
                </div>
            </div>
        </section>

        <section class="lw-testimonials lw-testimonials--light lw-testimonials--duo lw-section" aria-labelledby="services-testimonials-title">
            <div class="lw-container lw-stack lw-stack--lg">
                <div class="lw-section-heading lw-section-heading--center">
                    <p class="lw-eyebrow lw-section-heading__eyebrow">{{ $testimonialsHeader['eyebrow'] ?? 'Client Love' }}</p>
                    <h2 id="services-testimonials-title" class="lw-visually-hidden">{{ $testimonialsHeader['eyebrow'] ?? 'Client Love' }}</h2>
                </div>
                <div class="lw-testimonials__grid">
                    @foreach ($testimonials as $testimonial)
                        <blockquote class="lw-testimonials__item">
                            <span class="lw-testimonials__mark" aria-hidden="true">“</span>
                            @if (!empty($testimonial['bullets']))
                                <div>{!! $testimonial['intro'] !!}</div>
                                <ul class="lw-testimonials__bullets">
                                    @foreach ($testimonial['bullets'] as $bullet)
                                        <li>{{ $bullet }}</li>
                                    @endforeach
                                </ul>
                                <div>{!! $testimonial['outro'] !!}</div>
                            @else
                                <div>{!! $testimonial['quote'] !!}</div>
                            @endif
                            <footer class="lw-testimonials__person">
                                <span class="lw-testimonials__avatar" aria-hidden="true">
                                    @include('partials.publisher-icon', ['name' => 'people'])
                                </span>
                                <span>
                                    <cite class="lw-testimonials__name">{{ $testimonial['name'] }}</cite>
                                    @if (!empty($testimonial['meta']))
                                        <span class="lw-testimonials__meta">{{ $testimonial['meta'] }}</span>
                                    @endif
                                    <span class="lw-testimonials__role">{{ $testimonial['role'] }}</span>
                                </span>
                            </footer>
                        </blockquote>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
