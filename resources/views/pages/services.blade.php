@extends('layouts.app')

@section('title', 'Services — LinkingWordz')

@section('content')
    <div class="lw-page lw-services-page">
        <section class="lw-page-hero" aria-labelledby="services-page-title">
            <div class="lw-container lw-page-hero__inner">
                <p class="lw-eyebrow">What we do</p>
                <h1 id="services-page-title">Strategic content for people building something worth being known for.</h1>
                <p class="lw-page-hero__lede">From manuscript polish to market visibility, we bring research, writing, editorial thinking, and content strategy together.</p>
            </div>
        </section>

        <section class="lw-services-feature lw-section" aria-label="Editorial studio">
            <div class="lw-container lw-services-feature__grid">
                <figure><img src="{{ asset('images/pages/services-editorial.jpg') }}" alt="Editorial content studio workspace with manuscript pages and fountain pen"></figure>
                <div><p class="lw-eyebrow">One connected engagement</p><h2>Good content starts with a clear point of view.</h2><p>We bring research, writing, editing, and strategy together so your message feels considered from the first line to the final call to action.</p></div>
            </div>
        </section>

        <section class="lw-services-audiences lw-section">
            <div class="lw-container lw-services-audiences__grid">
                <a href="{{ route('services.authors') }}" class="lw-services-audience-card lw-services-audience-card--teal"><span class="lw-eyebrow">For authors &amp; publishers</span><h2>Build a body of work readers come back to.</h2><p>Copyediting, proofreading, book writing, translation, promotional blogs, websites, and LinkedIn strategy.</p><span class="lw-services-audience-card__link">Explore Author/Publisher <span aria-hidden="true">→</span></span></a>
                <a href="{{ route('services.brands') }}" class="lw-services-audience-card lw-services-audience-card--mauve"><span class="lw-eyebrow">For businesses &amp; brands</span><h2>Make your expertise easier to find and trust.</h2><p>Content strategy, website content, SEO/AEO, LinkedIn ghostwriting, outreach, and editorial support.</p><span class="lw-services-audience-card__link">Explore Brands <span aria-hidden="true">→</span></span></a>
            </div>
        </section>

        <section class="lw-services-list lw-section">
            <div class="lw-container">
                <div class="lw-section-heading"><p class="lw-eyebrow">Our services</p><h2>One thoughtful engagement or one focused service.</h2></div>
                <div class="lw-services-list__columns">
                    <div><p class="lw-services-list__label">Authors</p><ul>@foreach ($authorsServices as $service)<li><span>✦</span>{{ $service }}</li>@endforeach</ul></div>
                    <div><p class="lw-services-list__label">Brands</p><ul>@foreach ($brandServices as $service)<li><span>✦</span>{{ $service }}</li>@endforeach</ul></div>
                </div>
            </div>
        </section>

        <section class="lw-services-process lw-section"><div class="lw-container"><div class="lw-section-heading lw-section-heading--center"><p class="lw-eyebrow">A clear starting point</p><h2>Tell us where you are. We'll help you see what comes next.</h2></div><div class="lw-services-process__steps"><div><span>01</span><h3>Book a call</h3><p>Free 30-minute discovery.</p></div><div><span>02</span><h3>Share the brief</h3><p>Your goals, audience, and context.</p></div><div><span>03</span><h3>Choose the fit</h3><p>A focused scope and clear next step.</p></div></div></div></section>
    </div>
@endsection
