<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Studio') — LinkingWordz Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600&family=Fraunces:ital,opsz,wght@0,9..144,500;1,9..144,500&family=Outfit:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="ad">
    <aside class="ad-side">
        <a class="ad-brand" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/live/live-logo-light.png') }}" alt="LinkingWordz">
            <span>Studio</span>
        </a>
        <nav class="ad-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-on' : '' }}">Overview</a>
            <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'is-on' : '' }}">Journal</a>
            <a href="{{ route('admin.comments.index') }}" class="{{ request()->routeIs('admin.comments.*') ? 'is-on' : '' }}">Comments</a>
            <a href="{{ route('admin.inquiries.index') }}" class="{{ request()->routeIs('admin.inquiries.*') ? 'is-on' : '' }}">Inquiries</a>
            <a href="{{ route('blog') }}" target="_blank" rel="noreferrer">View site ↗</a>
        </nav>
        <form class="ad-logout" method="post" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">Sign out</button>
        </form>
    </aside>
    <div class="ad-main">
        <header class="ad-top">
            <div>
                <p class="ad-kicker">@yield('kicker', 'Studio')</p>
                <h1>@yield('heading', 'Overview')</h1>
            </div>
            <div class="ad-user">
                <span>{{ auth()->user()->name }}</span>
                <small>{{ auth()->user()->email }}</small>
            </div>
        </header>
        @if (session('status'))
            <p class="ad-flash">{{ session('status') }}</p>
        @endif
        @yield('content')
    </div>
</body>
</html>
