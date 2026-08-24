@extends('layouts.app')

@section('title', $title . ' — LinkingWordz')

@section('content')
    <section class="lw-section lw-placeholder-page">
        <div class="lw-container lw-stack lw-stack--lg">
            <div class="lw-stack">
                <p class="lw-eyebrow">Laravel + Blade foundation</p>
                <h1>{{ $title }}</h1>
                <p class="lw-lede">{{ $description }}</p>
            </div>
            <div class="lw-placeholder" aria-hidden="true"><p class="lw-placeholder__label">Page content coming next</p></div>
        </div>
    </section>
@endsection
