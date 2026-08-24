@extends('layouts.app')

@section('title', 'About — LinkingWordz')

@section('content')
    <div class="lw-page lw-about-page">
        <section class="lw-page-hero" aria-labelledby="about-title">
            <div class="lw-container lw-page-hero__inner">
                <p class="lw-eyebrow">The person behind the work</p>
                <h1 id="about-title">Words with depth. Work with intention.</h1>
                <p class="lw-page-hero__lede">LinkingWordz is an editorial content studio for authors, publishers, service businesses, and brands that want their expertise to be understood.</p>
            </div>
        </section>

        <section class="lw-about-intro lw-section">
            <div class="lw-container lw-about-intro__grid">
                <figure class="lw-about-intro__figure"><img src="{{ asset('images/shruti-founder.jpg') }}" alt="Shruti Bhatt writing at her desk"></figure>
                <div class="lw-about-intro__copy">
                    <p class="lw-eyebrow">Hi, I'm Shruti.</p>
                    <h2>A writer who understands the work behind the words.</h2>
                    <p>I'm a content writer, copyeditor, and ghostwriter with 9+ years of professional experience across linguistics, content, and writing — working with clients across finance, technology, and education.</p>
                    <p>Before LinkingWordz, I was a college lecturer in Accounting, Finance, and Management. I hold an M.Phil in Management, and I bring that research foundation into every brief I take on.</p>
                    <p>LinkingWordz is built on a simple belief: human-written, research-backed content is still the most powerful way to build trust with the people you want to reach.</p>
                    <a href="{{ route('contact') }}" class="lw-btn lw-btn--primary">Start a conversation <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                </div>
            </div>
        </section>

        <section class="lw-about-stats lw-section">
            <div class="lw-container">
                <div class="lw-about-stats__grid">
                    <div><strong>9+</strong><span>Years experience</span><p>Linguistics, content &amp; writing</p></div>
                    <div><strong>M.Phil</strong><span>In Management</span><p>Research-led editorial work</p></div>
                    <div><strong>5–10</strong><span>Clients at a time</span><p>Personal attention, not a queue</p></div>
                    <div><strong>3</strong><span>Core fields</span><p>Finance · Technology · Education</p></div>
                </div>
            </div>
        </section>

        <section class="lw-about-belief lw-section">
            <div class="lw-container lw-about-belief__inner">
                <p class="lw-eyebrow">The LinkingWordz approach</p>
                <blockquote>“Human-written, research-backed content is still the most powerful way to build trust with the people you want to reach.”</blockquote>
                <cite>— Shruti, Founder</cite>
            </div>
        </section>

        <section class="lw-about-expertise lw-section">
            <div class="lw-container lw-about-expertise__grid">
                <div><p class="lw-eyebrow">Subject matter matters</p><h2>Most editors understand language. Fewer understand the field they're editing in.</h2></div>
                <div><p>Our background spans finance, psychology, mental health, technology, and education. That means editorial work that goes beyond grammar to genuine subject-matter understanding.</p><p>Every brief is approached with curiosity, structure, and the care it deserves.</p></div>
            </div>
        </section>
    </div>
@endsection
