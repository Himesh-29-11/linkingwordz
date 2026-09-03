@extends('layouts.app')

@section('title', 'Home — LinkingWordz')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/hero-editorial.css') }}?v=2">
@endpush

@section('content')
    @php
        $hero = $sections['hero'] ?? [];
        $stats = $sections['stats'] ?? [];
        $publications = $sections['publications'] ?? [];
        $audienceHeader = $sections['audience'] ?? [];
        $problemHeader = $sections['problem'] ?? [];
        $servicesHeader = $sections['services'] ?? [];
        $whyHeader = $sections['why'] ?? [];
        $founderSection = $sections['founder'] ?? [];
        $processHeader = $sections['process'] ?? [];
        $workSection = $sections['work'] ?? [];
        $finalCta = $sections['final_cta'] ?? [];
    @endphp
    <section class="lw-hero lw-hero--editorial" aria-labelledby="hero-heading">
        <div class="lw-dots lw-dots-left" aria-hidden="true">
            <span></span><span></span><span></span>
            <span></span><span></span><span></span>
            <span></span><span></span><span></span>
        </div>

        <div class="lw-wave-decoration" aria-hidden="true">
            <span></span><span></span><span></span><span></span><span></span>
        </div>

        <div class="lw-hero-container">
            <div class="lw-hero-content">
                <div class="lw-eyebrow">
                    {!! nl2br(e($hero['eyebrow'] ?? '')) !!}
                </div>

                <h1 id="hero-heading">
                    The right
                    <span>{{ $hero['title_accent_1'] ?? 'words' }}</span>
                    find the right
                    <span>{{ $hero['title_accent_2'] ?? 'clients.' }}</span>
                    <strong>{{ $hero['title_strong'] ?? 'We make sure yours do.' }}</strong>
                </h1>

                <div class="lw-title-line" aria-hidden="true"></div>

                <p class="lw-hero-description">
                    {{ $hero['description'] ?? '' }}
                </p>

                <p class="lw-hero-highlight">
                    {!! nl2br(e($hero['highlight'] ?? '')) !!}
                </p>

                <div class="lw-hero-actions">
                    <a href="{{ route('services.authors') }}" class="lw-btn lw-btn-primary">
                        I'm an author or publisher
                        <span aria-hidden="true">→</span>
                    </a>
                    <a href="{{ route('contact') }}" class="lw-btn lw-btn-link">
                        I run a service business
                        <span aria-hidden="true">→</span>
                    </a>
                </div>

                <p class="lw-discovery">
                    {{ $hero['discovery'] ?? '' }}
                </p>
            </div>

            <div class="lw-hero-visual">
                <div class="lw-photo-frame">
                    <div class="lw-photo-outline" aria-hidden="true"></div>
                    <img
                        src="{{ asset($hero['image'] ?? 'images/shruti-hero.jpg') }}"
                        alt="Shruti Bhatt, founder of Linkingwordz"
                        class="lw-founder-image"
                    >
                </div>

                <div class="lw-founder-card">
                    <div class="lw-founder-icon" aria-hidden="true">
                        <img src="{{ asset('images/pen-icon.png') }}" alt="" width="22" height="22">
                    </div>
                    <div>
                        <div class="lw-founder-title">{{ $hero['founder_title'] ?? '' }}</div>
                        <div class="lw-founder-role">{{ $hero['founder_role'] ?? '' }}</div>
                    </div>
                </div>

                <div class="lw-round-badge" aria-hidden="true">
                    <div class="lw-badge-inner">
                        <span>{{ $hero['badge_top'] ?? '' }}</span>
                        <b><img src="{{ asset('images/pen-icon.png') }}" alt=""></b>
                        <span>{{ $hero['badge_bottom'] ?? '' }}</span>
                    </div>
                </div>

                <div class="lw-mini-cards" aria-label="Core services">
                    <div class="lw-mini-card">
                        <div class="lw-mini-icon teal" aria-hidden="true">
                            @include('partials.publisher-icon', ['name' => 'edit'])
                        </div>
                        <div>
                            <h3>{{ $hero['mini_1_title'] ?? 'Copywriter' }}</h3>
                            <p>{{ $hero['mini_1_text'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="lw-mini-card">
                        <div class="lw-mini-icon mauve" aria-hidden="true">
                            @include('partials.publisher-icon', ['name' => 'book'])
                        </div>
                        <div>
                            <h3>{{ $hero['mini_2_title'] ?? 'Content Writer' }}</h3>
                            <p>{{ $hero['mini_2_text'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lw-stats" aria-label="Experience highlights">
            <div class="lw-stat">
                <strong>{{ $stats['stat_1_value'] ?? '' }}</strong>
                <span>{{ $stats['stat_1_label'] ?? '' }}</span>
            </div>
            <div class="lw-stat">
                <strong>{{ $stats['stat_2_value'] ?? '' }}</strong>
                <span>{{ $stats['stat_2_label'] ?? '' }}</span>
            </div>
            <div class="lw-stat">
                <strong>{{ $stats['stat_3_value'] ?? '' }}</strong>
                <span>{{ $stats['stat_3_label'] ?? '' }}</span>
            </div>
            <div class="lw-stat">
                <strong>{{ $stats['stat_4_value'] ?? '' }}</strong>
                <span>{{ $stats['stat_4_label'] ?? '' }}</span>
            </div>
        </div>
    </section>

    <section class="lw-trust lw-publication-strip" aria-label="As read and published in">
        <div class="lw-trust__inner">
            <p class="lw-publication-strip__label">{{ $publications['label'] ?? '' }}</p>
            <div class="lw-publication-strip__names">
                @foreach (preg_split('/\r\n|\r|\n/', $publications['names'] ?? '') as $name)
                    @if (trim($name) !== '')
                        <span>{{ trim($name) }}</span>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="lw-audience lw-section" aria-labelledby="audience-title">
        <span class="lw-audience__dots lw-audience__dots--left" aria-hidden="true"></span>
        <span class="lw-audience__dots lw-audience__dots--right" aria-hidden="true"></span>
        <span class="lw-audience__waves" aria-hidden="true"></span>
        <div class="lw-container">
            <div class="lw-audience__header">
                <p class="lw-audience__label"><span class="lw-audience__label-line" aria-hidden="true"></span><span>{{ $audienceHeader['label'] ?? '' }}</span><span class="lw-audience__label-line" aria-hidden="true"></span></p>
                <h2 id="audience-title" class="lw-audience__headline">{{ $audienceHeader['title'] ?? '' }}</h2>
                <p class="lw-audience__intro">{{ $audienceHeader['intro'] ?? '' }}</p>
            </div>
            <div class="lw-audience__cards-wrap">
                <div class="lw-audience__cards">
                    @foreach ($audienceCards as $card)
                        <article class="lw-audience__card lw-audience__card--{{ $card['tone'] }}">
                            <div class="lw-audience__card-panel">
                                <span class="lw-audience__card-icon" aria-hidden="true">
                                    @if ($card['icon'] === 'book')
                                        <svg viewBox="0 0 24 24" class="lw-audience__card-icon-svg"><path d="M5 4.5h7a3 3 0 0 1 3 3V19.5H8a3 3 0 0 1-3-3V4.5Z" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M9 4.5h7a3 3 0 0 1 3 3V19.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
                                    @else
                                        <svg viewBox="0 0 24 24" class="lw-audience__card-icon-svg"><rect x="4" y="7" width="16" height="12" rx="1.5" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M9 7V5.5A2.5 2.5 0 0 1 11.5 3h1A2.5 2.5 0 0 1 15 5.5V7" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
                                    @endif
                                </span>
                                @if (!empty($card['kicker']))
                                    <p class="lw-audience__kicker">{{ $card['kicker'] }}</p>
                                @endif
                                <h3 class="lw-audience__card-title">{{ $card['title'] }}</h3>
                                <p class="lw-audience__card-description">{{ $card['description'] }}</p>
                                <p class="lw-audience__services">{{ $card['highlights'][0] }}</p>
                                <a href="{{ $card['href'] }}" class="lw-audience__card-cta">{{ $card['cta'] }} <span aria-hidden="true">→</span></a>
                            </div>
                            <figure class="lw-audience__card-photo"><img src="{{ asset($card['image']) }}" alt="{{ $card['imageAlt'] }}" class="lw-audience__photo"></figure>
                        </article>
                    @endforeach
                </div>
            </div>
            <aside class="lw-audience__banner">
                <div class="lw-audience__banner-copy"><span class="lw-audience__banner-icon" aria-hidden="true">?</span><p>{{ $audienceHeader['banner'] ?? '' }}</p></div>
                <a href="{{ route('contact') }}" class="lw-audience__banner-cta">Book a free discovery call <span aria-hidden="true">→</span></a>
            </aside>
        </div>
    </section>

    <section class="lw-problem lw-section" aria-labelledby="problem-title">
        <div class="lw-container">
            <div class="lw-problem__layout">
                <div class="lw-problem__intro"><p class="lw-eyebrow">{{ $problemHeader['eyebrow'] ?? '' }}</p><h2 id="problem-title" class="lw-problem__headline">{{ $problemHeader['title'] ?? '' }}</h2><p class="lw-problem__subhead">{{ $problemHeader['subhead'] ?? '' }}</p></div>
                <ul class="lw-problem__grid">
                    @foreach ($problems as $problem)
                        <li class="lw-problem__item"><span class="lw-problem__index" aria-hidden="true">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><p>“{{ $problem }}”</p></li>
                    @endforeach
                </ul>
            </div>
            <p class="lw-problem__closing">{{ $problemHeader['closing'] ?? '' }}</p>
        </div>
    </section>

    <section class="lw-services lw-section" aria-labelledby="services-title">
        <div class="lw-container lw-stack lw-stack--lg">
            <div class="lw-section-heading lw-section-heading--center">
                <p class="lw-eyebrow lw-section-heading__eyebrow">{{ $servicesHeader['eyebrow'] ?? '' }}</p>
                <h2 id="services-title" class="lw-section-heading__title">{{ $servicesHeader['title'] ?? '' }}</h2>
            </div>
            <div class="lw-services__cards">
                @foreach ($featuredServices as $service)
                    <a href="{{ url($service['href']) }}" class="lw-services__card">
                        <span class="lw-services__icon">@include('partials.publisher-icon', ['name' => $service['icon']])</span>
                        <h3>{{ $service['title'] }}</h3>
                        <p>{{ $service['text'] }}</p>
                        <span class="lw-services__card-link">Learn more <span aria-hidden="true">→</span></span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="lw-why lw-section" aria-labelledby="why-title">
        <div class="lw-container lw-stack lw-stack--lg">
            <div class="lw-section-heading lw-section-heading--center">
                <p class="lw-eyebrow lw-section-heading__eyebrow">{{ $whyHeader['eyebrow'] ?? '' }}</p>
                <h2 id="why-title" class="lw-section-heading__title">{{ $whyHeader['title'] ?? '' }}</h2>
                <p class="lw-section-heading__description">{{ $whyHeader['description'] ?? '' }}</p>
            </div>
            <div class="lw-why__grid">
                @foreach ($whyBlocks as $block)
                    <article class="lw-why__item"><span class="lw-why__icon">@include('partials.publisher-icon', ['name' => $block['icon']])</span><span class="lw-why__num" aria-hidden="true">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><h3>{{ $block['title'] }}</h3><p>{{ $block['description'] }}</p></article>
                @endforeach
            </div>
            <div class="lw-why__close">
                <a href="{{ route('contact') }}" class="lw-btn lw-btn--primary">Book a Free Discovery Call <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                <p>Free. No obligation. Not even after two calls.</p>
            </div>
        </div>
    </section>

    <section class="lw-founder lw-section lw-has-rings" aria-labelledby="founder-title">
        <div class="lw-container"><div class="lw-founder__layout"><figure class="lw-founder__figure"><img src="{{ asset($founderSection['image'] ?? 'images/shruti-founder.jpg') }}" alt="Shruti Bhatt writing at her desk" class="lw-founder__photo"></figure><div class="lw-founder__copy"><p class="lw-eyebrow">{{ $founderSection['eyebrow'] ?? '' }}</p><h2 id="founder-title" class="lw-founder__title">{{ $founderSection['title'] ?? '' }}</h2><p class="lw-founder__text">{{ $founderSection['text_1'] ?? '' }}</p><p class="lw-founder__text">{{ $founderSection['text_2'] ?? '' }}</p><p class="lw-founder__text">{{ $founderSection['text_3'] ?? '' }}</p><p class="lw-founder__credentials">{{ $founderSection['credentials'] ?? '' }}</p><a href="{{ route('about') }}" class="lw-btn lw-btn--primary">Learn more about me <span class="lw-btn__arrow" aria-hidden="true">→</span></a></div></div></div>
    </section>

    <section class="lw-process lw-section" aria-labelledby="process-title">
        <div class="lw-container lw-stack lw-stack--lg">
            <div class="lw-section-heading lw-section-heading--center">
                <p class="lw-eyebrow lw-section-heading__eyebrow">{{ $processHeader['eyebrow'] ?? '' }}</p>
                <h2 id="process-title" class="lw-section-heading__title">{{ $processHeader['title'] ?? '' }}</h2>
            </div>
            <div class="lw-process__grid">
                @foreach ($processSteps as $step)
                    <article class="lw-process__step">
                        <span class="lw-process__icon">@include('partials.publisher-icon', ['name' => $step['icon']])</span>
                        <span class="lw-process__number">{{ $step['number'] }}</span>
                        <h3>{{ $step['title'] }}</h3>
                        <p>{{ $step['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="lw-work lw-section" aria-labelledby="work-title">
        <div class="lw-container">
            <div class="lw-spotlight__intro">
                <p class="lw-eyebrow">{{ $workSection['eyebrow'] ?? '' }}</p>
                <h2 id="work-title">{{ $workSection['title'] ?? '' }}</h2>
            </div>
            @php $work = $selectedWork[0]; @endphp
            <article class="lw-spotlight">
                <figure class="lw-spotlight__photo">
                    <img src="{{ asset($work['image']) }}" alt="Kiran Lasiyal">
                    <figcaption>
                        <strong>Kiran Lasiyal</strong>
                        <span>Social Media Manager &amp; video editor</span>
                    </figcaption>
                </figure>
                <div class="lw-spotlight__copy">
                    <p class="lw-spotlight__tag">{{ $workSection['tag'] ?? '' }}</p>
                    <h3>{{ $work['title'] }}</h3>
                    <p class="lw-spotlight__lede">{{ $workSection['lede'] ?? '' }}</p>
                    <ul class="lw-spotlight__stats">
                        <li><strong>26%</strong><span>Post impressions in a week</span></li>
                        <li><strong>9.3%</strong><span>Follower growth</span></li>
                        <li><strong>20 hrs</strong><span>Turnaround</span></li>
                        <li><strong>0</strong><span>Revisions needed</span></li>
                    </ul>
                    <blockquote class="lw-spotlight__quote">
                        <p>{{ $workSection['quote'] ?? '' }}</p>
                        <cite>{{ $workSection['quote_cite'] ?? '' }}</cite>
                    </blockquote>
                    <a href="{{ route('work') }}" class="lw-btn lw-btn--primary">Read the case study <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                </div>
            </article>
        </div>
    </section>

    <section class="lw-testimonials lw-section" aria-labelledby="testimonials-title">
        <div class="lw-container lw-stack lw-stack--lg">
            <div class="lw-section-heading lw-section-heading--center">
                <p class="lw-eyebrow lw-section-heading__eyebrow">Client Love</p>
                <h2 id="testimonials-title" class="lw-visually-hidden">Client Love</h2>
            </div>
            <div class="lw-testimonials__grid">
                @foreach ($testimonials as $testimonial)
                    <blockquote class="lw-testimonials__item">
                        <span class="lw-testimonials__mark" aria-hidden="true">“</span>
                        <div class="lw-testimonials__quote">{!! $testimonial['quote'] !!}</div>
                        <footer class="lw-testimonials__person">
                            <img src="{{ asset($testimonial['avatar']) }}" alt="">
                            <span><cite class="lw-testimonials__name">{{ $testimonial['name'] }}</cite><span class="lw-testimonials__role">{{ $testimonial['role'] }}</span></span>
                        </footer>
                    </blockquote>
                @endforeach
            </div>
        </div>
    </section>

    <section class="lw-insights lw-section" aria-labelledby="insights-title">
        <div class="lw-container lw-stack lw-stack--lg">
            <div class="lw-section-heading-row">
                <div class="lw-section-heading">
                    <p class="lw-eyebrow lw-section-heading__eyebrow">Insights</p>
                    <h2 id="insights-title" class="lw-section-heading__title">Ideas, strategies and inspiration.</h2>
                </div>
                <a href="{{ route('insights') }}" class="lw-section-heading__link">Visit the blog <span aria-hidden="true">→</span></a>
            </div>
            <div class="lw-insights__grid">
                @foreach ($insights as $insight)
                    <a href="{{ url($insight['href']) }}" class="lw-insights__card">
                        <figure class="lw-insights__image"><img src="{{ asset($insight['image']) }}" alt="{{ $insight['title'] }}"></figure>
                        <p class="lw-insights__tag">Insights</p>
                        <h3>{{ $insight['title'] }}</h3>
                        <p class="lw-insights__excerpt">{{ $insight['text'] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="lw-final-cta" aria-labelledby="final-cta-title">
        <div class="lw-container lw-final-cta__inner">
            <span class="lw-final-cta__icon" aria-hidden="true">
                <svg viewBox="0 0 48 48">
                    <path d="M11 35c5-5 6-13 12-21 2-3 5-5 8-6-1 4-2 7-5 10-5 5-9 5-15 7Z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="m25 25 6 6M27 16l7-7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </span>
            <div class="lw-final-cta__copy">
                <h2 id="final-cta-title">Not sure where to start? That's what the first call is for.</h2>
                <p>I'm Shruti — and I've spent 9+ years in the content, linguistic, and writing industry helping authors get discovered and service businesses build content that converts.</p>
                <p>If you're open to a conversation — no agenda, no pressure, no packages pushed — just book a call. We'll figure out together which direction makes sense for your brand.</p>
                <p>Working across finance, technology, and education has taught me one thing: the best content doesn't just sound good. It reaches the right person at the right moment — and moves them to act.</p>
                <p>And if you just have a quick question? Write to me. That kind of guidance is always free.</p>
                <p class="lw-final-cta__fit">“We are the right fit if you are open to give your all in.”</p>
            </div>
            <div class="lw-final-cta__actions">
                <a href="{{ route('contact') }}" class="lw-btn lw-btn--secondary">Book a Free Discovery Call <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                <a href="mailto:connect@linkingwordz.com" class="lw-final-cta__email">Or email us at- connect@linkingwordz.com</a>
            </div>
            <span class="lw-final-cta__dots" aria-hidden="true"></span>
        </div>
    </section>
@endsection
