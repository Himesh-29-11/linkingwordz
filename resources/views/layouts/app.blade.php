<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Content and editorial services for authors and service businesses.">
    <title>@yield('title', 'LinkingWordz')</title>
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
</body>
</html>
