@extends('layouts.app')

@section('title', $title . ' — LinkingWordz')

@section('content')
    <section class="lw-section lw-legal-page">
        <div class="lw-container lw-container--narrow">
            <p class="lw-eyebrow">LinkingWordz</p>
            <h1>{{ $title }}</h1>

            @if (!empty($body))
                {!! $body !!}
            @elseif ($page === 'privacy-policy')
                @include('pages.partials.privacy-default')
            @else
                <p class="lw-lede">This page is reserved for the approved {{ strtolower($title) }} copy.</p>
                <div class="lw-legal-page__placeholder">
                    <p>Content will be added here before launch.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
