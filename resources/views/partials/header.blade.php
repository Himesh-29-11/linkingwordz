@php
    $navItems = [
        ['href' => route('home'), 'label' => 'Home'],
        [
            'href' => route('work'),
            'label' => 'Case Study',
            'children' => [
                ['href' => route('work'), 'label' => 'All case studies'],
                ['href' => route('work.show', 'norwood-press'), 'label' => 'Norwood Press'],
                ['href' => route('work.show', 'fintech-brand'), 'label' => 'FinTech brand'],
                ['href' => route('work.show', 'saas-company'), 'label' => 'SaaS company'],
                ['href' => route('work.show', 'education-platform'), 'label' => 'Education platform'],
            ],
        ],
        ['href' => route('about'), 'label' => 'About'],
        [
            'href' => route('services'),
            'label' => 'Services',
            'children' => [
                ['href' => route('services.brands'), 'label' => 'Brands'],
                ['href' => route('services.authors'), 'label' => 'Authors'],
                ['href' => route('contact'), 'label' => 'Work With Me'],
            ],
        ],
        [
            'href' => route('blog'),
            'label' => 'Blog',
            'children' => [
                ['href' => route('blog'), 'label' => 'All insights'],
                ['href' => route('blog.show', 'content-that-ranks'), 'label' => 'Content that ranks'],
                ['href' => route('blog.show', 'editorial-storytelling'), 'label' => 'Editorial storytelling'],
                ['href' => route('blog.show', 'digital-pr-vs-link-building'), 'label' => 'Digital PR vs links'],
                ['href' => route('blog.show', 'book-marketing-2026'), 'label' => 'Book marketing 2026'],
            ],
        ],
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
                        <li class="lw-header__item{{ !empty($item['children']) ? ' lw-header__item--has-menu' : '' }}">
                            @if (!empty($item['children']))
                                <a href="{{ $item['href'] }}" class="lw-header__link" aria-haspopup="true">
                                    <span>{{ $item['label'] }}</span>
                                    <span class="lw-header__caret" aria-hidden="true"></span>
                                </a>
                                <ul class="lw-header__dropdown" role="list">
                                    @foreach ($item['children'] as $child)
                                        <li><a href="{{ $child['href'] }}">{{ $child['label'] }}</a></li>
                                    @endforeach
                                </ul>
                            @else
                                <a href="{{ $item['href'] }}" class="lw-header__link">{{ $item['label'] }}</a>
                            @endif
                        </li>
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
                            <li>
                                @if (!empty($item['children']))
                                    <details class="lw-header__mobile-sub">
                                        <summary>{{ $item['label'] }}</summary>
                                        <ul>
                                            <li><a href="{{ $item['href'] }}">Overview</a></li>
                                            @foreach ($item['children'] as $child)
                                                <li><a href="{{ $child['href'] }}">{{ $child['label'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    </details>
                                @else
                                    <a href="{{ $item['href'] }}">{{ $item['label'] }}</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </nav>
                <a href="{{ route('contact') }}" class="lw-header__mobile-cta"><span>Start a project</span><span aria-hidden="true">→</span></a>
            </div>
        </details>
    </div>
</header>
