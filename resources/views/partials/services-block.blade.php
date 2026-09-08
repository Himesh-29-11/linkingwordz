@php
    use App\Support\PageSectionDefaults;

    $proseParagraphs = PageSectionDefaults::parseParagraphs($block['prose'] ?? '');
    $checkItems = PageSectionDefaults::parseLines($block['checklist'] ?? '');
@endphp
<section class="lw-svc-block{{ $alt ? ' lw-svc-block--alt' : '' }}" @if($anchor) id="{{ $anchor }}" @endif>
    <div class="lw-container">
        <p class="lw-svc-num">{{ $block['num'] ?? '' }}</p>
        <h2>{{ $block['title'] ?? '' }}</h2>
        <p class="lw-svc-sub">{{ $block['subhead'] ?? '' }}</p>
        <div class="lw-svc-prose">
            @foreach ($proseParagraphs as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>
        @if ($checkItems !== [])
            <ul class="lw-svc-check lw-svc-check--wide">
                @foreach ($checkItems as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        @endif
        @if (! empty($block['aside']))
            <p class="lw-svc-aside">
                @if ($asideLink ?? false)
                    <a href="{{ route('services.authors') }}">{!! $block['aside'] !!}</a>
                @else
                    {!! $block['aside'] !!}
                @endif
            </p>
        @endif
    </div>
</section>
