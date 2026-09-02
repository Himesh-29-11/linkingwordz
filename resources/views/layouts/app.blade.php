<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Content and editorial services for authors and service businesses.')">
    @hasSection('meta_keywords')
        <meta name="keywords" content="@yield('meta_keywords')">
    @endif
    <title>@yield('title', 'LinkingWordz')</title>
    <meta property="og:title" content="@yield('title', 'LinkingWordz')">
    <meta property="og:description" content="@yield('meta_description', 'Content and editorial services for authors and service businesses.')">
    <meta property="og:type" content="website">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600&family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,600;1,9..144,500&family=Outfit:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
      :root {
        --font-display: "Fraunces", "Iowan Old Style", Georgia, serif;
        --font-body: "Outfit", "Avenir Next", system-ui, sans-serif;
        --font-label: "Cinzel", Georgia, serif;
      }
    </style>
    <link rel="stylesheet" href="/css/site.css?v=hero16">
    @stack('head')
</head>
<body>
    <div class="lw-site">
        <a class="lw-skip-link" href="#main-content">Skip to content</a>
        @include('partials.header')
        <main id="main-content" class="lw-site__main">
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
    @include('partials.floating-actions')
    <script src="/js/site.js?v=float1" defer></script>
    @stack('scripts')
</body>
</html>
