@extends('layouts.app')

@section('title', $work['title'] . ' — LinkingWordz')

@section('content')
    <article class="lw-case-study">
        <header class="lw-case-study__hero"><div class="lw-container"><p class="lw-eyebrow">{{ $work['category'] }}</p><h1>{{ $work['title'] }}</h1><p>{{ $work['text'] }}</p></div></header>
        <div class="lw-container lw-case-study__body"><figure class="lw-case-study__image"><img src="{{ asset($work['image']) }}" alt="{{ $work['title'] }}"></figure><div class="lw-case-study__content"><p class="lw-eyebrow">The work</p><h2>Making the message do more.</h2><p>{{ $work['result'] }}</p><div class="lw-case-study__blocks"><div><span>01</span><h3>The brief</h3><p>Clarify the story, understand the audience, and create content with a job to do.</p></div><div><span>02</span><h3>The approach</h3><p>Research first, then a considered editorial system built around the right people and platforms.</p></div><div><span>03</span><h3>The outcome</h3><p>{{ $work['text'] }}</p></div></div><a href="{{ route('contact') }}" class="lw-btn lw-btn--primary">Start your project <span class="lw-btn__arrow" aria-hidden="true">→</span></a></div></div>
    </article>
@endsection
