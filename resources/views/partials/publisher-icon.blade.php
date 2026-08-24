@switch($name)
    @case('edit')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="m8 23.5-1.5 4 4-1.5L25 11.5 20.5 7 8 23.5Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="m18.5 9 4.5 4.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
        @break
    @case('translate')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M6 7h12M12 7c0 7-3 11-7 14M8 14c2 2 4 3.5 7 4.5M17 25l5-14 5 14M19 20h6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
    @case('book')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M6 5h10a4 4 0 0 1 4 4v18H10a4 4 0 0 1-4-4V5ZM20 9a4 4 0 0 1 4-4h2v22h-6M10 10h6M10 15h6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" stroke-linecap="round"/></svg>
        @break
    @case('search')
        <svg viewBox="0 0 32 32" aria-hidden="true"><circle cx="14" cy="14" r="7" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="m19.5 19.5 7 7M7 25c2-3 4.5-4.5 7-4.5s5 1.5 7 4.5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        @break
    @case('spark')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16 4v24M4 16h24M8 8l16 16M24 8 8 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><circle cx="16" cy="16" r="3" fill="none" stroke="currentColor" stroke-width="1.4"/></svg>
        @break
    @case('website')
        <svg viewBox="0 0 32 32" aria-hidden="true"><rect x="5" y="6" width="22" height="18" rx="1.5" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M5 11h22M11 28h10M16 24v4M9 8.5h.1M12 8.5h.1" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        @break
    @case('linkedin')
        <svg viewBox="0 0 32 32" aria-hidden="true"><rect x="5" y="5" width="22" height="22" rx="3" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M10 13v9M10 10.5v.1M15 22v-5a3 3 0 0 1 6 0v5M15 13v9" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        @break
    @case('finance')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M5 12 16 6l11 6-11 6-11-6ZM8 15v8M13 17v8M18 17v8M23 15v8M5 27h22" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
    @case('health')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16 27S6 21 6 13a5 5 0 0 1 10-2 5 5 0 0 1 10 2c0 8-10 14-10 14Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M10 16h4l2-4 2 8 2-4h3" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
    @case('travel')
        <svg viewBox="0 0 32 32" aria-hidden="true"><circle cx="16" cy="16" r="11" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M5 16h22M16 5c3 3 4.5 7 4.5 11S19 24 16 27c-3-3-4.5-7-4.5-11S13 8 16 5Z" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
        @break
    @case('mind')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16 27V12M16 16c-5 0-8-3-8-7 4-.5 7 1 8 4M16 20c5 0 8-3 8-7-4-.5-7 1-8 4M16 12c1-4 4-6 8-5 0 4-3 6-8 5Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
    @case('lifestyle')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M25 7C14 7 7 13 7 24c8 1 15-3 18-17Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M7 24c4-5 8-8 14-11" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        @break
    @case('social')
        <svg viewBox="0 0 32 32" aria-hidden="true"><circle cx="16" cy="9" r="3" fill="none" stroke="currentColor" stroke-width="1.5"/><circle cx="8" cy="13" r="2.5" fill="none" stroke="currentColor" stroke-width="1.5"/><circle cx="24" cy="13" r="2.5" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M10 25c0-4 2.5-6.5 6-6.5s6 2.5 6 6.5M4.5 24c.3-2.8 2-4.5 4.5-4.8M27.5 24c-.3-2.8-2-4.5-4.5-4.8" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        @break
    @case('phone')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M9 5.5 13 4l3 7-3 2c1.4 3 3.1 4.6 6 6l2-3 7 3-1.5 4c-.6 1.6-2.3 2.4-3.9 2C13.7 22.5 9.5 18.3 7 11.4c-.6-1.7.2-3.4 2-5.9Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
        @break
    @case('proposal')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M8 4h12l5 5v19H8V4Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M20 4v6h5M12 16h9M12 21h7" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        @break
    @case('chat')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M5 7.5h22v14H13l-6 5v-5H5v-14Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M11 14.5h.1M16 14.5h.1M21 14.5h.1" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        @break
    @case('check')
        <svg viewBox="0 0 32 32" aria-hidden="true"><circle cx="16" cy="16" r="11" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="m10.5 16 3.5 3.5 7.5-8" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
    @case('whatsapp')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M8 24.5 6 28l4.4-1.8A11 11 0 1 0 8 24.5Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M12 11.5c.5-1 1.2-1 1.8-.2l1.2 1.6c.4.5.3 1-.1 1.5l-.8.8c.9 1.7 2.1 2.8 3.8 3.7l.8-.8c.5-.4 1-.5 1.5-.1l1.6 1.2c.8.6.8 1.3-.2 1.8-1.1.6-2.4.5-3.6-.1-3.7-1.8-5.8-4-7.7-7.7-.6-1.2-.7-2.5-.1-3.6Z" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg>
        @break
    @case('mail')
        <svg viewBox="0 0 32 32" aria-hidden="true"><rect x="4.5" y="8" width="23" height="16" rx="1.5" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="m5 9 11 9 11-9" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
        @break
    @case('calendar')
        <svg viewBox="0 0 32 32" aria-hidden="true"><rect x="5" y="7" width="22" height="20" rx="1.5" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M10 5v4M22 5v4M5 13h22M10 18h.1M16 18h.1M22 18h.1M10 23h.1M16 23h.1" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        @break
    @case('folder')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M4.5 9.5h9l2.5 3h11.5v13h-23v-16Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M4.5 12.5h23" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
        @break
    @case('article')
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M8 4.5h12l4 4v19H8v-23Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M20 4.5v5h4M12 15h8M12 19h8M12 23h5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        @break
@endswitch
