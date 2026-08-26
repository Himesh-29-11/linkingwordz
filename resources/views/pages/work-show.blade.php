@extends('layouts.app')

@section('title', $work['title'] . ' — LinkingWordz')

@section('content')
    <script>window.location.replace(@json(route('work')));</script>
    <div class="lw-container lw-section">
        <p class="lw-eyebrow">Case study</p>
        <h1>{{ $work['title'] }}</h1>
        <p>{{ $work['text'] }}</p>
        <p><a href="{{ route('work') }}" class="lw-btn lw-btn--primary">View the case study <span class="lw-btn__arrow" aria-hidden="true">→</span></a></p>
    </div>
@endsection
