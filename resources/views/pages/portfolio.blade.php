@extends('layouts.app')

@section('title', 'Portfolio — LinkingWordz')
@section('meta_description', 'Explore client websites, writing samples, and project documents from LinkingWordz.')

@section('content')
    <div class="lw-page lw-portfolio-page">
        <header class="lw-portfolio-hero">
            <div class="lw-container">
                <p class="lw-eyebrow">Portfolio</p>
                <h1>Client work, samples &amp; documents</h1>
                <p>Browse websites we've built, writing samples, and project documents from authors and brands we've worked with.</p>
            </div>
        </header>

        <section class="lw-portfolio-grid lw-section" aria-label="Portfolio items">
            <div class="lw-container">
                @if (count($portfolioItems) > 0)
                    <div class="lw-portfolio-grid__items">
                        @foreach ($portfolioItems as $item)
                            <article class="lw-portfolio-card">
                                <div class="lw-portfolio-card__media">
                                    @if (!empty($item['photo']))
                                        <img src="{{ asset($item['photo']) }}" alt="{{ $item['client_name'] }}">
                                    @else
                                        <div class="lw-portfolio-card__placeholder" aria-hidden="true">
                                            @include('partials.publisher-icon', ['name' => 'people'])
                                        </div>
                                    @endif
                                </div>
                                <div class="lw-portfolio-card__body">
                                    <h2>{{ $item['client_name'] }}</h2>
                                    @if (!empty($item['summary']))
                                        <p>{{ $item['summary'] }}</p>
                                    @endif
                                    <div class="lw-portfolio-card__links">
                                        @if (!empty($item['website_url']))
                                            <a class="lw-btn lw-btn--primary lw-btn--sm" href="{{ $item['website_url'] }}" target="_blank" rel="noreferrer">
                                                Visit website <span class="lw-btn__arrow" aria-hidden="true">↗</span>
                                            </a>
                                        @endif
                                        @foreach ($item['documents'] ?? [] as $document)
                                            <a class="lw-portfolio-card__doc" href="{{ asset($document['path']) }}" target="_blank" rel="noreferrer">
                                                <span aria-hidden="true">@include('partials.publisher-icon', ['name' => 'proposal'])</span>
                                                {{ $document['label'] ?? $document['original_name'] ?? 'View document' }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="lw-portfolio-empty">
                        <p>Portfolio items will appear here once they are added in the admin.</p>
                        <a class="lw-btn lw-btn--primary" href="{{ route('contact') }}">Request a sample <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
