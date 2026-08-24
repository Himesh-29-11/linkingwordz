@extends('layouts.app')

@section('title', $insight['title'] . ' — LinkingWordz')

@section('content')
    <article class="lw-article"><header class="lw-article__hero"><div class="lw-container"><p class="lw-eyebrow">{{ $insight['category'] }}</p><h1>{{ $insight['title'] }}</h1><p>{{ $insight['text'] }}</p></div></header><div class="lw-container lw-article__body"><figure><img src="{{ asset($insight['image']) }}" alt="{{ $insight['title'] }}"></figure><div class="lw-article__copy"><p class="lw-article__byline">By Shruti Bhatt · LinkingWordz</p>@foreach ($insight['body'] as $paragraph)<p>{{ $paragraph }}</p>@endforeach<a href="{{ route('contact') }}" class="lw-btn lw-btn--primary">Start a conversation <span class="lw-btn__arrow" aria-hidden="true">→</span></a></div></div></article>
@endsection
