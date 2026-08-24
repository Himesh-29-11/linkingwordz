@extends('layouts.app')

@section('title', 'Insights — LinkingWordz')

@section('content')
    <div class="lw-page lw-insights-page">
        <section class="lw-page-hero" aria-labelledby="insights-page-title"><div class="lw-container lw-page-hero__inner"><p class="lw-eyebrow">Insights</p><h1 id="insights-page-title">Ideas, strategies and inspiration.</h1><p class="lw-page-hero__lede">Practical thinking on writing, publishing, authority, and the work of being understood online.</p></div></section>
        <section class="lw-insights-index lw-section"><div class="lw-container"><div class="lw-insights-index__grid">@foreach ($insights as $insight)<a href="{{ route('insights.show', ['slug' => $insight['slug']]) }}" class="lw-insights-index__card"><figure><img src="{{ asset($insight['image']) }}" alt="{{ $insight['title'] }}"></figure><p class="lw-eyebrow">{{ $insight['category'] }}</p><h2>{{ $insight['title'] }}</h2><p>{{ $insight['text'] }}</p><span>Read article <b aria-hidden="true">→</b></span></a>@endforeach</div></div></section>
    </div>
@endsection
