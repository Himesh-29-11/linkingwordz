@extends('layouts.app')

@section('title', 'Home — LinkingWordz')

@section('content')
    <section class="lw-hero" aria-labelledby="hero-heading">
        <div class="lw-hero__inner">
            <div class="lw-hero__copy">
                <p class="lw-hero__eyebrow">
                    <span>Editorial Content Studio</span>
                    <span class="lw-hero__eyebrow-rule" aria-hidden="true"></span>
                </p>
                <h1 id="hero-heading" class="lw-hero__title">We write with the <em>right words</em> for the <em>right clients.</em></h1>
                <p class="lw-hero__description">Linkingwordz is a content and editorial brand built for authors who want their work discovered, and service businesses whose expertise deserves a stronger voice online. Human-written. Research-backed. Built around your brand. Not a template.</p>
                <div class="lw-hero__actions">
                    <a href="{{ route('services.authors') }}" class="lw-btn lw-btn--primary">I'm an author or publisher <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                    <a href="{{ route('services.brands') }}" class="lw-btn lw-btn--ghost">I run a service business <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                </div>
                <p class="lw-hero__note">Not sure which fits? <a href="{{ route('contact') }}">Book a free discovery call</a> — we'll figure it out together.</p>
            </div>
            <div class="lw-hero__visual">
                <div class="lw-hero__deco-word" aria-hidden="true">Words</div>
                <div class="lw-hero__arc" aria-hidden="true"></div>
                <figure class="lw-hero__portrait">
                    <img src="{{ asset('images/shruti-hero.png') }}" alt="Shruti Bhatt, founder of LinkingWordz, at her desk with notebook and pen" class="lw-hero__photo">
                </figure>
                <aside class="lw-hero__founder-card">
                    <p class="lw-hero__founder-name">Shruti Bhatt</p>
                    <p class="lw-hero__founder-role">Founder · Content Writer, Copyeditor &amp; Ghostwriter</p>
                </aside>
                <div class="lw-hero__roles" aria-label="Core services">
                    <div class="lw-hero__role-card">
                        <span class="lw-hero__role-icon">@include('partials.publisher-icon', ['name' => 'edit'])</span>
                        <span><strong>Copywriter</strong><small>Words that connect and convert.</small></span>
                    </div>
                    <div class="lw-hero__role-card">
                        <span class="lw-hero__role-icon">@include('partials.publisher-icon', ['name' => 'book'])</span>
                        <span><strong>Content Writer</strong><small>Stories that inform, engage and rank.</small></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="lw-trust lw-publication-strip" aria-label="As read and published in">
        <div class="lw-trust__inner">
            <p class="lw-publication-strip__label">As read &amp; published in</p>
            <div class="lw-publication-strip__names">
                <span>The Ledger Review</span>
                <span>Norwood Press</span>
                <span>Formé Studio</span>
                <span>Inkwell Digest</span>
            </div>
        </div>
    </section>

    <section class="lw-audience lw-section" aria-labelledby="audience-title">
        <span class="lw-audience__dots lw-audience__dots--left" aria-hidden="true"></span>
        <span class="lw-audience__dots lw-audience__dots--right" aria-hidden="true"></span>
        <span class="lw-audience__waves" aria-hidden="true"></span>
        <div class="lw-container">
            <div class="lw-audience__header">
                <p class="lw-audience__label"><span class="lw-audience__label-line" aria-hidden="true"></span><span>Who we write for</span><span class="lw-audience__label-line" aria-hidden="true"></span></p>
                <h2 id="audience-title" class="lw-audience__headline">Two audiences. One <em>editorial</em> partner.</h2>
                <p class="lw-audience__intro">Linkingwordz is built for two kinds of people — with one goal: meaningful content that connects and converts.</p>
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
                                <h3 class="lw-audience__card-title">{{ $card['title'] }}</h3>
                                <p class="lw-audience__card-description">{{ $card['description'] }}</p>
                                <ul class="lw-audience__highlights">
                                    @foreach ($card['highlights'] as $highlight)
                                        <li><span class="lw-audience__highlight-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 12.5 9.5 17 19 7.5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span><span>{{ $highlight }}</span></li>
                                    @endforeach
                                </ul>
                                <a href="{{ $card['href'] }}" class="lw-audience__card-cta">{{ $card['cta'] }} <span aria-hidden="true">→</span></a>
                            </div>
                            <figure class="lw-audience__card-photo"><img src="{{ asset($card['image']) }}" alt="{{ $card['imageAlt'] }}" class="lw-audience__photo"></figure>
                        </article>
                    @endforeach
                </div>
            </div>
            <aside class="lw-audience__banner">
                <div class="lw-audience__banner-copy"><span class="lw-audience__banner-icon" aria-hidden="true">?</span><p>Not sure which fits? <a href="{{ route('contact') }}">Book a free discovery call</a> — we'll figure it out together.</p></div>
                <a href="{{ route('contact') }}" class="lw-audience__banner-cta">Book a free discovery call <span aria-hidden="true">→</span></a>
            </aside>
        </div>
    </section>

    <section class="lw-problem lw-section" aria-labelledby="problem-title">
        <div class="lw-container">
            <div class="lw-problem__reference-layout">
                <div class="lw-problem__intro">
                    <p class="lw-eyebrow">The problem</p>
                    <h2 id="problem-title" class="lw-problem__headline">Most content is written to fill a calendar. <em>Not to build authority.</em></h2>
                </div>
                <div class="lw-problem__answer">
                    <p>It doesn't connect. It doesn't rank. And it certainly doesn't convert.</p>
                    <strong>We do things differently.</strong>
                    <p>We create content that earns attention, builds trust and drives measurable results.</p>
                    <span class="lw-problem__pen" aria-hidden="true">@include('partials.publisher-icon', ['name' => 'edit'])</span>
                </div>
            </div>
        </div>
    </section>

    <section class="lw-services lw-section" aria-labelledby="services-title">
        <div class="lw-container lw-stack lw-stack--lg">
            <div class="lw-section-heading lw-section-heading--center">
                <p class="lw-eyebrow lw-section-heading__eyebrow">What we do</p>
                <h2 id="services-title" class="lw-section-heading__title">Strategic content. Editorial excellence. Real impact.</h2>
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
            <div class="lw-section-heading lw-section-heading--center"><p class="lw-eyebrow lw-section-heading__eyebrow">What makes this different</p><h2 id="why-title" class="lw-section-heading__title">Human-written. Research-backed. Built around your brand.</h2></div>
            <div class="lw-why__grid">
                @foreach ($whyBlocks as $block)
                    <article class="lw-why__item"><span class="lw-why__icon">@include('partials.publisher-icon', ['name' => $block['icon']])</span><span class="lw-why__num" aria-hidden="true">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><h3>{{ $block['title'] }}</h3><p>{{ $block['description'] }}</p></article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="lw-founder lw-section" aria-labelledby="founder-title">
        <div class="lw-container"><div class="lw-founder__layout"><figure class="lw-founder__figure"><img src="{{ asset('images/shruti-founder.jpg') }}" alt="Shruti Bhatt writing at her desk" class="lw-founder__photo"></figure><div class="lw-founder__copy"><p class="lw-eyebrow">The person behind the work</p><h2 id="founder-title" class="lw-founder__title">Hi, I'm Shruti.</h2><p class="lw-founder__text">I'm a content writer, copyeditor, and ghostwriter with 9+ years of professional experience across linguistics, content, and writing — working with clients across finance, technology, and education.</p><p class="lw-founder__text">Before LinkingWordz, I was a college lecturer in Accounting, Finance, and Management — a role that gave me something most writers don't have: genuine depth in the subjects I write and edit in. I hold an M.Phil in Management, and I bring that research foundation into every brief I take on.</p><p class="lw-founder__text">LinkingWordz is built on a simple belief — that human-written, research-backed content is still the most powerful way to build trust with the people you want to reach. I work with a maximum of 5 to 10 clients at a time, because your brand deserves full attention. Not a queue.</p><p class="lw-founder__credentials">M.Phil in Management · 9+ Years Industry Experience · Finance · Technology · Education</p><a href="{{ route('about') }}" class="lw-btn lw-btn--primary">Learn more about me <span class="lw-btn__arrow" aria-hidden="true">→</span></a></div></div></div>
    </section>

    <section class="lw-process lw-section" aria-labelledby="process-title">
        <div class="lw-container lw-stack lw-stack--lg">
            <div class="lw-section-heading lw-section-heading--center">
                <p class="lw-eyebrow lw-section-heading__eyebrow">Our process</p>
                <h2 id="process-title" class="lw-section-heading__title">A clear process. Thoughtful execution.</h2>
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
        <div class="lw-container lw-stack lw-stack--lg">
            <div class="lw-section-heading-row">
                <div class="lw-section-heading">
                    <p class="lw-eyebrow lw-section-heading__eyebrow">Selected work</p>
                    <h2 id="work-title" class="lw-section-heading__title">Real clients. Real results.</h2>
                </div>
                <a href="{{ route('work') }}" class="lw-section-heading__link">View all case studies <span aria-hidden="true">→</span></a>
            </div>
            <div class="lw-work__grid">
                @foreach ($selectedWork as $work)
                    <a href="{{ url($work['href']) }}" class="lw-work__card">
                        <figure class="lw-work__card-image"><img src="{{ asset($work['image']) }}" alt="{{ $work['title'] }}"></figure>
                        <div class="lw-work__card-body">
                            <h3>{{ $work['title'] }}</h3>
                            <p>{{ $work['text'] }}</p>
                            <span class="lw-work__card-link">Read case study <span aria-hidden="true">→</span></span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="lw-testimonials lw-section" aria-labelledby="testimonials-title">
        <div class="lw-container lw-stack lw-stack--lg">
            <div class="lw-section-heading lw-section-heading--center">
                <p class="lw-eyebrow lw-section-heading__eyebrow">What clients say</p>
                <h2 id="testimonials-title" class="lw-visually-hidden">What clients say</h2>
            </div>
            <div class="lw-testimonials__grid">
                @foreach ($testimonials as $testimonial)
                    <blockquote class="lw-testimonials__item">
                        <span class="lw-testimonials__mark" aria-hidden="true">“</span>
                        <p>{{ $testimonial['quote'] }}</p>
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
                <h2 id="final-cta-title">Ready to create content that builds authority and drives results?</h2>
                <p>Let's talk about your goals and how we can achieve them together.</p>
            </div>
            <div class="lw-final-cta__actions">
                <a href="{{ route('contact') }}" class="lw-btn lw-btn--secondary">Book a free discovery call <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
            </div>
            <span class="lw-final-cta__dots" aria-hidden="true"></span>
        </div>
    </section>
@endsection
