@php
    $navItems = [
        ['href' => route('about'), 'label' => 'About'],
        ['href' => route('services.authors'), 'label' => 'Author/Publisher'],
        ['href' => route('services.brands'), 'label' => 'Brands'],
        ['href' => route('work'), 'label' => 'Work'],
        ['href' => route('insights'), 'label' => 'Insights'],
        ['href' => route('contact'), 'label' => 'Contact'],
    ];
@endphp

<header class="lw-header">
    <div class="lw-container lw-header__inner">
        <a href="{{ route('home') }}" class="lw-header__brand" aria-label="LinkingWordz home">
            <span class="lw-header__brand-mark" aria-hidden="true">l</span>
            <span>Linking<span class="lw-header__brand-accent">Wordz</span></span>
        </a>

        <div class="lw-header__desktop-actions">
            <nav class="lw-header__nav" aria-label="Primary">
                <ul class="lw-header__list">
                    @foreach ($navItems as $item)
                        <li><a href="{{ $item['href'] }}">{{ $item['label'] }}</a></li>
                    @endforeach
                </ul>
            </nav>
            <a href="{{ route('contact') }}" class="lw-header__cta"><span>Book a call</span><span aria-hidden="true">↗</span></a>
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
                <a href="{{ route('contact') }}" class="lw-header__mobile-cta"><span>Book a free discovery call</span><span aria-hidden="true">↗</span></a>
            </div>
        </details>
    </div>
</header>
