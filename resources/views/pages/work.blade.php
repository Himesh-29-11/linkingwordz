@extends('layouts.app')

@section('title', 'Work — LinkingWordz')

@section('content')
    <div class="lw-page lw-work-page">
        <section class="lw-page-hero" aria-labelledby="work-page-title">
            <div class="lw-container lw-page-hero__inner">
                <p class="lw-eyebrow">Selected work</p>
                <h1 id="work-page-title">Real clients. Real results.</h1>
                <p class="lw-page-hero__lede">A selection of content, editorial, SEO, and authority-building work designed to
                    make the right message easier to find.</p>
            </div>
        </section>
        <section class="lw-work-index lw-section">
            <div class="lw-container">
                <div class="lw-work-index__grid">
                    @foreach ($workItems as $work)
                        <a href="{{ route('work.show', ['slug' => $work['slug']]) }}" class="lw-work-index__card">
                            <figure><img src="{{ asset($work['image']) }}" alt="{{ $work['title'] }}"></figure>
                            <div>
                                <p class="lw-eyebrow">{{ $work['category'] }}</p>
                                <h2>{{ $work['title'] }}</h2>
                                <p>{{ $work['text'] }}</p><span>Read case study <b aria-hidden="true">→</b></span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
