@php($whatsapp = \App\Support\Cms::contact('whatsapp'))
<div class="lw-floating-actions" aria-hidden="false">
    <a
        class="lw-floating-actions__whatsapp"
        href="https://wa.me/{{ $whatsapp }}"
        target="_blank"
        rel="noreferrer"
        aria-label="Chat on WhatsApp at +91 9901230875"
    >
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M8 24.5 6 28l4.4-1.8A11 11 0 1 0 8 24.5Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M12 11.5c.5-1 1.2-1 1.8-.2l1.2 1.6c.4.5.3 1-.1 1.5l-.8.8c.9 1.7 2.1 2.8 3.8 3.7l.8-.8c.5-.4 1-.5 1.5-.1l1.6 1.2c.8.6.8 1.3-.2 1.8-1.1.6-2.4.5-3.6-.1-3.7-1.8-5.8-4-7.7-7.7-.6-1.2-.7-2.5-.1-3.6Z" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg>
        <span>WhatsApp</span>
    </a>
    <button type="button" class="lw-floating-actions__top" data-scroll-top aria-label="Scroll to top">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5.5 5 12.5M12 5.5l7 7M12 5.5V18.5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
</div>
