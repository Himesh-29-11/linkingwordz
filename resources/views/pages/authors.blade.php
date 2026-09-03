@extends('layouts.app')

@section('title', 'Author/Publisher — LinkingWordz')

@section('content')
    @php
        $hero = $sections['hero'] ?? [];
        $offerings = [
            ['number' => '01', 'icon' => 'edit', 'title' => 'Copyediting & Proofreading', 'text' => 'Line-by-line refinement and final professional eye before publication — zero errors at print.'],
            ['number' => '02', 'icon' => 'translate', 'title' => 'Book Translation', 'text' => "English/Hindi to 10 main Indian languages — expanding your author's reach across India's diverse reading markets."],
            ['number' => '03', 'icon' => 'book', 'title' => 'Book Writing', 'text' => "Full manuscript in the author's voice — they own it entirely."],
            ['number' => '04', 'icon' => 'search', 'title' => 'Book Promotional Blogs', 'text' => 'SEO + AEO-optimized blogs for long-term reader discovery.'],
            ['number' => '05', 'icon' => 'website', 'title' => 'Author Website Content & Design', 'text' => 'Full website copy — Home, About, Books, Blog, Contact.'],
            ['number' => '06', 'icon' => 'linkedin', 'title' => 'LinkedIn Strategic Content', 'text' => 'Initial 3-month package & beyond to build authority, awareness, and reader expansion.'],
        ];

        $proofreading = [
            'Two Google Meet calls (intake + editorial debrief)',
            'Custom style sheet created and maintained throughout',
            'Full editorial report with feedback and recommendations',
            'Manuscript returned with tracked changes',
            'Second clean manuscript after changes implemented',
            'Spelling — every word, every page',
            'Punctuation and grammar',
            'Heading style and font consistency throughout',
            'Page numbers and chapter/section divisions',
            'Graphs, tables, captions, and illustrations',
            'Up to two rounds of revision',
        ];

        $translation = [
            'Translation from English/Hindi to 10 main Indian languages',
            'Professional native speakers for each language',
            'Cultural adaptation and localization',
            'Glossary and terminology consistency',
            'Quality assurance and proofreading in target language',
        ];

        $translationReasons = [
            ['title' => 'Market Expansion', 'text' => "India's 22 official languages represent 1.4 billion readers. English reaches only 10% of India's population. Translation unlocks access to 90% of the market."],
            ['title' => 'Author Authority Across Regions', 'text' => 'A translated book positions the author as a thought leader across linguistic communities — not just English-speaking audiences.'],
            ['title' => 'Long-term Revenue & Discoverability', 'text' => 'Translated books have longer shelf lives in regional markets and generate sustained revenue beyond the English launch window.'],
        ];

        $bookWritingIncluded = [
            'Full manuscript development in author\'s voice',
            'Research and outline creation',
            'Chapter-by-chapter writing',
            'Author collaboration calls (intake + progress + final debrief)',
            'Manuscript formatting and structure',
            'Author retains full ownership',
            'Delivery timeline and revision rounds',
        ];

        $bookWritingReasons = [
            ['title' => 'Time & Expertise Gap', 'text' => 'Authors often have brilliant ideas but lack the dedicated time or writing bandwidth to bring them to fruition.'],
            ['title' => 'Voice Authenticity', 'text' => "A professional writer can skillfully capture and amplify the author's unique perspective, ensuring the final manuscript truly reflects their voice."],
            ['title' => 'Market-Ready Quality', 'text' => 'The manuscript is delivered publication-ready, minimizing the need for extensive rewrites and accelerating the path to market.'],
        ];

        $difference = [
            ['title' => 'Human-Written. Always.', 'text' => 'Every word crafted by hand — no AI-generated filler, no recycled frameworks.'],
            ['title' => 'Research is the Foundation', 'text' => 'M.Phil in Management + 9+ years of experience means genuine intellectual rigor on every brief.'],
            ['title' => 'Content + Development Together', 'text' => 'For author websites: content strategy, writing, design direction, and development coordination — all under one engagement.'],
            ['title' => 'Timelines We Commit To', 'text' => 'Delivered 10 blogs per author for 5 authors in a single month — without compromising research quality or voice consistency.'],
        ];

        $connectSteps = [
            ['number' => '01', 'title' => 'Book Call', 'text' => 'Free 30-minute discovery'],
            ['number' => '02', 'title' => 'Discuss Needs', 'text' => 'Manuscript or publishing goals'],
            ['number' => '03', 'title' => 'Service Proposal', 'text' => 'Recommended services and timeline'],
            ['number' => '04', 'title' => 'Your Decision', 'text' => 'Choose with no pressure'],
        ];
    @endphp

    <div class="lw-publisher-page">
        <header class="lw-publisher-hero">
            <div class="lw-container">
                <p class="lw-publisher-eyebrow">{{ $hero['eyebrow'] ?? '' }}</p>
                <h1>{!! $hero['title'] ?? '' !!}</h1>
                <p class="lw-publisher-hero__lede">{{ $hero['lede'] ?? '' }}</p>
                <div class="lw-publisher-hero__rule" aria-hidden="true"></div>
            </div>
        </header>

        <section class="lw-publisher-about lw-section" aria-labelledby="publisher-about-title">
            <div class="lw-container">
                <div class="lw-publisher-section-heading">
                    <p class="lw-publisher-eyebrow">About Shruti &amp; Linkingwordz</p>
                    <h2 id="publisher-about-title">Editorial depth for every stage of the journey.</h2>
                </div>
                <div class="lw-publisher-stats">
                    <div><strong>9+</strong><span>Years</span><p>Professional experience in linguistics, content writing, and copyediting</p></div>
                    <div><strong>M.Phil</strong><span>in Management</span><p>Academic depth means every brief is approached with genuine research — not surface-level assumptions</p></div>
                    <div><strong>5–10</strong><span>Clients Max</span><p>Deliberately limited — every client receives full attention, not a production queue</p></div>
                    <div><strong>3</strong><span>Countries</span><p>India · UK · US</p></div>
                </div>
                <blockquote class="lw-publisher-quote">“Human-written, research-backed content is still the most powerful way to build trust with the people you want to reach.” <cite>— Shruti, Founder</cite></blockquote>
            </div>
        </section>

        <section class="lw-publisher-offers lw-section" aria-labelledby="publisher-offers-title">
            <div class="lw-container">
                <div class="lw-publisher-section-heading">
                    <p class="lw-publisher-eyebrow">What We Offer Publishers</p>
                    <h2 id="publisher-offers-title">Full spectrum — from manuscript polish to market visibility.</h2>
                    <p>Every service available independently or as part of a coordinated engagement.</p>
                </div>
                <div class="lw-publisher-offer-grid">
                    @foreach ($offerings as $offering)
                        <article class="lw-publisher-offer-card">
                            <div class="lw-publisher-offer-card__top">
                                <span>{{ $offering['number'] }}</span>
                                <span class="lw-publisher-offer-icon">@include('partials.publisher-icon', ['name' => $offering['icon']])</span>
                            </div>
                            <h3>{{ $offering['title'] }}</h3>
                            <p>{{ $offering['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="lw-publisher-detail lw-section" aria-labelledby="publisher-editorial-title">
            <div class="lw-container">
                <div class="lw-publisher-detail__heading">
                    <p class="lw-publisher-eyebrow">Editorial Quality</p>
                    <h2 id="publisher-editorial-title">Copyediting &amp; Proofreading / Translation</h2>
                </div>
                <div class="lw-publisher-detail__grid">
                    <article class="lw-publisher-panel">
                        <h3>Copyediting &amp; Proofreading of a manuscript</h3>
                        <ul class="lw-publisher-checklist">
                            @foreach ($proofreading as $item)
                                <li><span aria-hidden="true">✓</span>{{ $item }}</li>
                            @endforeach
                        </ul>
                        <p class="lw-publisher-note">With an M.Phil in Management and experience in finance, psychology, and mental health — we understand the subject matter we are editing in. Not just the grammar.</p>
                    </article>
                    <article class="lw-publisher-panel lw-publisher-panel--tinted">
                        <h3>Book Translation</h3>
                        <h4>What's Included</h4>
                        <ul class="lw-publisher-checklist">
                            @foreach ($translation as $item)
                                <li><span aria-hidden="true">✓</span>{{ $item }}</li>
                            @endforeach
                        </ul>
                        <h4>Why It's Necessary</h4>
                        <ol class="lw-publisher-reasons">
                            @foreach ($translationReasons as $reason)
                                <li><strong>{{ $reason['title'] }}:</strong> {{ $reason['text'] }}</li>
                            @endforeach
                        </ol>
                    </article>
                </div>
            </div>
        </section>

        <section class="lw-publisher-writing lw-section" aria-labelledby="book-writing-title">
            <div class="lw-container">
                <div class="lw-publisher-section-heading">
                    <p class="lw-publisher-eyebrow">Full Manuscript Support</p>
                    <h2 id="book-writing-title">Book Writing — In Detail</h2>
                </div>
                <div class="lw-publisher-detail__grid">
                    <article class="lw-publisher-panel">
                        <h3>What's Included</h3>
                        <ul class="lw-publisher-checklist">
                            @foreach ($bookWritingIncluded as $item)
                                <li><span aria-hidden="true">✓</span>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </article>
                    <article class="lw-publisher-panel lw-publisher-panel--dark">
                        <h3>Why It's Necessary</h3>
                        @foreach ($bookWritingReasons as $reason)
                            <div class="lw-publisher-mini-reason"><strong>{{ $reason['title'] }}</strong><p>{{ $reason['text'] }}</p></div>
                        @endforeach
                    </article>
                </div>
            </div>
        </section>

        <section class="lw-publisher-visibility lw-section" aria-labelledby="publisher-visibility-title">
            <div class="lw-container">
                <div class="lw-publisher-section-heading">
                    <p class="lw-publisher-eyebrow">Reader Discovery</p>
                    <h2 id="publisher-visibility-title">Book Promotional Blogs, Websites &amp; LinkedIn Content</h2>
                    <p class="lw-publisher-visibility__lead">Your publisher markets the book. Linkingwordz builds the author readers come back to.</p>
                </div>
                <div class="lw-publisher-visibility__grid">
                    <article><span class="lw-publisher-visibility-icon">@include('partials.publisher-icon', ['name' => 'search'])</span><h3>SEO — Search Engine Optimization</h3><p>Blogs surface when readers Google a question — we research what your audience searches for and build every blog around those terms.</p></article>
                    <article><span class="lw-publisher-visibility-icon">@include('partials.publisher-icon', ['name' => 'spark'])</span><h3>AEO — Answer Engine Optimization</h3><p>Content structured to be cited by ChatGPT, Perplexity, and Google AI Overviews — positioning the book as the answer long after launch day.</p></article>
                    <article><span class="lw-publisher-visibility-icon">@include('partials.publisher-icon', ['name' => 'website'])</span><h3>Website Content &amp; Development</h3><p>Full website copy — Home, About, Books, Blog, Contact — with content strategy and development coordination under one engagement.</p></article>
                    <article><span class="lw-publisher-visibility-icon">@include('partials.publisher-icon', ['name' => 'linkedin'])</span><h3>LinkedIn Content &amp; Strategy — Initial 3-Month Package</h3><p>Stories, thought leadership, and authority posts written in the author's voice — posted by them. Audience built over time.</p></article>
                </div>
            </div>
        </section>

        <section class="lw-publisher-clients lw-section" aria-labelledby="publisher-clients-title">
            <div class="lw-container">
                <div class="lw-publisher-section-heading">
                    <p class="lw-publisher-eyebrow">Built for Publishing</p>
                    <h2 id="publisher-clients-title">Publishing Clients We Serve</h2>
                </div>
                <div class="lw-publisher-client-grid">
                    <article><h3>Publishers &amp; Literary Agents</h3><p>Traditional publishing houses and agents needing copyediting, proofreading, or book writing — adhering to your style guides with meticulous consistency.</p></article>
                    <article><h3>Indie &amp; Self-Publishing Authors</h3><p>Independent authors bringing their manuscript to the same editorial standard as traditional publishing — before it reaches a single reader.</p></article>
                    <article><h3>Corporate &amp; Business Brands</h3><p>Businesses producing white papers, thought leadership reports, and long-form brand content requiring book-level editorial rigor.</p></article>
                </div>
            </div>
        </section>

        <section class="lw-publisher-expertise lw-section" aria-labelledby="subject-matter-title">
            <div class="lw-container">
                <div class="lw-publisher-expertise__grid">
                    <div>
                        <p class="lw-publisher-eyebrow">Subject Matter Expertise</p>
                        <h2 id="subject-matter-title">Most editors understand language. Fewer understand the field they're editing in. We bring both.</h2>
                    </div>
                    <div><h3>Why It Matters</h3><p>Our background spans finance, psychology, and mental health — meaning editorial work that goes beyond grammar to genuine subject-matter understanding.</p><p>An M.Phil in Management and 9+ years of professional experience means every brief is approached with genuine intellectual rigor.</p></div>
                </div>
                <div class="lw-publisher-subject-grid">
                    <div><span>@include('partials.publisher-icon', ['name' => 'finance'])</span><strong>Finance &amp; Management</strong></div>
                    <div><span>@include('partials.publisher-icon', ['name' => 'health'])</span><strong>Physical Health &amp; Nutrition</strong></div>
                    <div><span>@include('partials.publisher-icon', ['name' => 'travel'])</span><strong>Travel &amp; Culture</strong></div>
                    <div><span>@include('partials.publisher-icon', ['name' => 'mind'])</span><strong>Psychology &amp; Mental Health</strong></div>
                    <div><span>@include('partials.publisher-icon', ['name' => 'lifestyle'])</span><strong>Lifestyle &amp; Self-Care</strong></div>
                    <div><span>@include('partials.publisher-icon', ['name' => 'social'])</span><strong>Social Impact &amp; NGOs</strong></div>
                </div>
            </div>
        </section>

        <section class="lw-publisher-difference lw-section" aria-labelledby="difference-title">
            <div class="lw-container">
                <div class="lw-publisher-section-heading lw-publisher-section-heading--center"><p class="lw-publisher-eyebrow">What Makes Linkingwordz Different</p><h2 id="difference-title">The details make the difference.</h2></div>
                <div class="lw-publisher-difference__grid">
                    @foreach ($difference as $item)
                        <article><span>{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><h3>{{ $item['title'] }}</h3><p>{{ $item['text'] }}</p></article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="lw-publisher-ready lw-section" aria-labelledby="ready-title">
            <div class="lw-container">
                <div class="lw-publisher-section-heading lw-publisher-section-heading--center"><p class="lw-publisher-eyebrow">A Clear Next Step</p><h2 id="ready-title">Ready to Work Together?</h2><p>Whether you're a publishing house seeking a reliable editorial partner, a literary agent needing copyediting support, or an author building their online presence — we're ready to talk.</p></div>
                <div class="lw-publisher-process">
                    <svg class="lw-publisher-process__path" viewBox="0 0 1000 380" preserveAspectRatio="none" aria-hidden="true">
                        <polyline points="18,88 125,88 125,300 375,300 375,88 625,88 625,300 875,300 875,88 982,88" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        <circle cx="18" cy="88" r="8" fill="currentColor" />
                        <circle cx="982" cy="88" r="8" fill="currentColor" />
                    </svg>
                    @foreach ($connectSteps as $step)
                        <article>
                            <span class="lw-publisher-process-number">{{ $step['number'] }}</span>
                            <h3>{{ $step['title'] }}</h3>
                            <p>{{ $step['text'] }}</p>
                        </article>
                    @endforeach
                </div>
                <p class="lw-publisher-no-pressure">No obligation. No pressure. Just a conversation about your authors' needs.</p>
            </div>
        </section>

        <section class="lw-publisher-connect lw-section" aria-labelledby="connect-title">
            <div class="lw-container">
                <div class="lw-publisher-section-heading">
                    <p class="lw-publisher-eyebrow">Get in touch</p>
                    <h2 id="connect-title">Let's Connect</h2>
                </div>

                <div class="lw-publisher-connect__grid">
                    <a href="https://wa.me/919901230875" target="_blank" rel="noreferrer"><span class="lw-publisher-connect__icon">@include('partials.publisher-icon', ['name' => 'whatsapp'])</span><span>WhatsApp</span><strong>+91 9901230875</strong></a>
                    <a href="mailto:connect@linkingwordz.com"><span class="lw-publisher-connect__icon">@include('partials.publisher-icon', ['name' => 'mail'])</span><span>Email Directly</span><strong>connect@linkingwordz.com</strong></a>
                    <a href="https://calendly.com/linkingwordz/30min" target="_blank" rel="noreferrer"><span class="lw-publisher-connect__icon">@include('partials.publisher-icon', ['name' => 'calendar'])</span><span>Book a Call</span><strong>calendly.com/linkingwordz/30min</strong></a>
                    <div><span class="lw-publisher-connect__icon">@include('partials.publisher-icon', ['name' => 'folder'])</span><span>Portfolio</span><strong>Google Drive portfolio</strong></div>
                    <a href="https://www.linkingwordz.com/blog" target="_blank" rel="noreferrer"><span class="lw-publisher-connect__icon">@include('partials.publisher-icon', ['name' => 'article'])</span><span>Sample Blogs</span><strong>www.linkingwordz.com/blog</strong></a>
                </div>

                <blockquote class="lw-publisher-quote">“Just book a call if you are open to give your all in.” <cite>— Shruti, Linkingwordz</cite></blockquote>
            </div>
        </section>
    </div>
@endsection
