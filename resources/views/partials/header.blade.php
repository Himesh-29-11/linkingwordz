@php
    $navItems = [
        ['href' => route('home'), 'label' => 'Home'],
        ['href' => route('work'), 'label' => 'Case Study'],
        ['href' => route('about'), 'label' => 'About'],
        ['href' => route('services'), 'label' => 'Services'],
        ['href' => route('blog'), 'label' => 'Blog'],
        ['href' => route('contact'), 'label' => 'Contact'],
    ];
@endphp

<header class="lw-header">
    <div class="lw-container lw-header__inner">
        <a href="{{ route('home') }}" class="lw-header__brand" aria-label="LinkingWordz home">
            <img src="{{ asset('images/live/live-logo.png') }}" alt="LinkingWordz">
        </a>
        <div class="lw-header__desktop-actions">
            <nav class="lw-header__nav" aria-label="Primary">
                <ul class="lw-header__list">
                    @foreach ($navItems as $item)
                        <li><a href="{{ $item['href'] }}">{{ $item['label'] }}</a></li>
                    @endforeach
                </ul>
            </nav>
            <a href="{{ route('contact') }}" class="lw-header__cta"><span>Start a project</span><span aria-hidden="true">→</span></a>
        </div>
        <details class="lw-header__mobile-menu">
            <summary aria-label="Open navigation menu"><span class="lw-header__menu-label">Menu</span><span class="lw-header__menu-icon" aria-hidden="true">+</span></summary>
            <div class="lw-header__mobile-panel">
                <nav class="lw-header__mobile-nav" aria-label="Mobile primary">
                    <ul class="lw-header__list">
                        @foreach ($navItems as $item)
                            <li><a href="{{ $item['href'] }}">{{ $item['label'] }}</a></li>
                        @endforeach
                    </ul>
                </nav>
                <a href="{{ route('contact') }}" class="lw-header__mobile-cta"><span>Start a project</span><span aria-hidden="true">→</span></a>
            </div>
        </details>
    </div>
</header>
