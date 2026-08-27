@extends('layouts.app')

@section('title', 'Home — LinkingWordz')

@section('content')
    <section class="lw-hero" aria-labelledby="hero-heading">
        @include('partials.ornament')
        <div class="lw-hero__inner">
            <div class="lw-hero__copy">
                <p class="lw-hero__eyebrow">
                    <span>Content &amp; Editorial Services for Authors and Service Businesses</span>
                    <span class="lw-hero__eyebrow-rule" aria-hidden="true"></span>
                </p>
                <h1 id="hero-heading" class="lw-hero__title">The right <em>words find the right clients.</em> We make sure yours do.</h1>
                <p class="lw-hero__description">Linkingwordz is a content and editorial brand built for two kinds of people — authors who want their work discovered, and service businesses whose expertise deserves a stronger voice online.</p>
                <p class="lw-hero__promise">Human-written. Research-backed. Built around your brand.<br>Not a template.</p>
                <div class="lw-hero__actions">
                    <a href="{{ route('services.authors') }}" class="lw-btn lw-btn--primary">I'm an author or publisher <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                    <a href="{{ route('contact') }}" class="lw-btn lw-btn--ghost">I run a service business <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
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
                    <p class="lw-hero__founder-name">Hello, I'm Shruti ;)</p>
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
                <p class="lw-audience__label"><span class="lw-audience__label-line" aria-hidden="true"></span><span>Two audiences. One standard of work.</span><span class="lw-audience__label-line" aria-hidden="true"></span></p>
                <h2 id="audience-title" class="lw-audience__headline">Which path is yours?</h2>
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
                <div class="lw-audience__banner-copy"><span class="lw-audience__banner-icon" aria-hidden="true">?</span><p>Not sure which fits? <a href="{{ route('contact') }}">Book a free discovery call</a> — we'll figure it out together.</p></div>
                <a href="{{ route('contact') }}" class="lw-audience__banner-cta">Book a free discovery call <span aria-hidden="true">→</span></a>
            </aside>
        </div>
    </section>

    <section class="lw-problem lw-section" aria-labelledby="problem-title">
        <div class="lw-container">
            <div class="lw-problem__layout">
                <div class="lw-problem__intro"><p class="lw-eyebrow">Why clients come to us</p><h2 id="problem-title" class="lw-problem__headline">You're not struggling because your work isn't good enough. You're struggling because it isn't visible enough.</h2><p class="lw-problem__subhead">We've heard this before. Many times.</p></div>
                <ul class="lw-problem__grid">
                    @foreach ($problems as $problem)
                        <li class="lw-problem__item"><span class="lw-problem__index" aria-hidden="true">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><p>“{{ $problem }}”</p></li>
                    @endforeach
                </ul>
            </div>
            <p class="lw-problem__closing">These are the 5 problems Linkingwordz was built to solve. Not with a production line — but with research, care, and a team that works with 5 to 10 clients at a time. Deliberately.</p>
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
            <div class="lw-section-heading lw-section-heading--center">
                <p class="lw-eyebrow lw-section-heading__eyebrow">What makes this different</p>
                <h2 id="why-title" class="lw-section-heading__title">5 problems. 1 solution. Built around your brand.</h2>
                <p class="lw-section-heading__description">Most content agencies give you a template. Most developers wait for your copy. Most editors don't understand your subject matter. At Linkingwordz, we bring all of it together; with the research depth, subject expertise, and personal attention that only comes from working with a small, intentional client list.</p>
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
        <div class="lw-container"><div class="lw-founder__layout"><figure class="lw-founder__figure"><img src="{{ asset('images/shruti-founder.jpg') }}" alt="Shruti Bhatt writing at her desk" class="lw-founder__photo"></figure><div class="lw-founder__copy"><p class="lw-eyebrow">The person behind the work</p><h2 id="founder-title" class="lw-founder__title">Hi, I'm Shruti.</h2><p class="lw-founder__text">I'm a content writer, copyeditor, and ghostwriter with 9+ years of professional experience across linguistics, content, and writing — working with clients across finance, technology, and education.</p><p class="lw-founder__text">Before Linkingwordz, I was a college lecturer in Accounting, Finance, and Management — a role that gave me something most writers don't have: genuine depth in the subjects I write and edit in. I hold an M.Phil in Management, and I bring that research foundation into every brief I take on.</p><p class="lw-founder__text">Linkingwordz is built on a simple belief — that human-written, research-backed content is still the most powerful way to build trust with the people you want to reach. I work with a maximum of 5 to 10 clients at a time, because your brand deserves full attention. Not a queue.</p><p class="lw-founder__credentials">M.Phil in Management · 9+ Years Industry Experience · Finance · Technology · Education</p><a href="{{ route('about') }}" class="lw-btn lw-btn--primary">Learn more about me <span class="lw-btn__arrow" aria-hidden="true">→</span></a></div></div></div>
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
                <a href="{{ route('services') }}" class="lw-fill-card">
                    <span>@include('partials.publisher-icon', ['name' => 'spark'])</span>
                    <strong>More stories in progress</strong>
                    <p>Strategy, voice, and editorial work across authors and brands.</p>
                </a>
                <a href="{{ route('services.authors') }}" class="lw-fill-card">
                    <span>@include('partials.publisher-icon', ['name' => 'book'])</span>
                    <strong>For authors</strong>
                    <p>Ghostwriting, editing, and book-discovery blogs.</p>
                </a>
                <a href="{{ route('contact') }}" class="lw-fill-card">
                    <span>@include('partials.publisher-icon', ['name' => 'chat'])</span>
                    <strong>Your project next</strong>
                    <p>Book a free discovery call — no obligation.</p>
                </a>
            </div>
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
