<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Content and editorial services for authors and service businesses.">
    <title>@yield('title', 'LinkingWordz')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400;0,6..96,500;0,6..96,600;0,6..96,700;1,6..96,400;1,6..96,500&family=Cinzel:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
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
    <script src="{{ asset('js/site.js') }}" defer></script>
</body>
</html>
