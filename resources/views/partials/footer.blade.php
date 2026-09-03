@php
    $footerEmail = \App\Support\Cms::contact('email');
    $footerAddress = \App\Support\Cms::contact('address');
    $footerFacebook = \App\Support\Cms::contact('facebook');
    $footerInstagram = \App\Support\Cms::contact('instagram');
    $footerLinkedin = \App\Support\Cms::contact('linkedin');
@endphp
<footer class="lw-footer">
    <div class="lw-footer__curve" aria-hidden="true">
        <svg viewBox="0 0 1440 110" preserveAspectRatio="none">
            <path d="M0 32C210 4 408 76 660 55C900 35 1130 72 1440 18V110H0Z" />
        </svg>
    </div>
    <div class="lw-footer__body">
        <div class="lw-container lw-footer__inner">
        <div class="lw-footer__main">
            <div class="lw-footer__intro">
                <a href="{{ route('home') }}" class="lw-footer__brand" aria-label="LinkingWordz home">
                    <img src="/images/live/live-logo-footer.png" alt="LinkingWordz">
                </a>
                <p class="lw-footer__studio">Editorial Content Studio</p>
                <span class="lw-footer__rule" aria-hidden="true"></span>
                <p class="lw-footer__statement">We write with the right words for the right clients — authors and businesses whose voice deserves to be heard.</p>
                <div class="lw-footer__socials" aria-label="Social links">
                    <a href="{{ $footerFacebook }}" target="_blank" rel="noreferrer" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 8.5h2.5l-.5 3H14v9h-3.5v-9H9V8.5h1.5V6.8c0-1.2.4-2.1 1.2-2.7.8-.6 1.9-.9 3.3-.9H14v3.1h-1.6c-.7 0-1.1.1-1.3.4-.2.3-.3.7-.3 1.2v1.4Z" fill="currentColor"/></svg>
                    </a>
                    <a href="{{ $footerInstagram }}" target="_blank" rel="noreferrer" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="3.8"/><circle cx="17.2" cy="6.8" r="1" fill="currentColor" stroke="none"/></svg>
                    </a>
                    <a href="{{ $footerLinkedin }}" target="_blank" rel="noreferrer" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.5 9.5h3v11h-3v-11ZM8 4.5a1.75 1.75 0 1 1 0 3.5 1.75 1.75 0 0 1 0-3.5ZM11 9.5h2.9v1.5h.1c.4-.8 1.4-1.6 2.9-1.6 3.1 0 3.7 2 3.7 4.7V20.5h-3v-5.2c0-1.2 0-2.8-1.7-2.8s-2 1.3-2 2.7v5.3H11V9.5Z" fill="currentColor"/></svg>
                    </a>
                </div>
            </div>

            <nav class="lw-footer__nav" aria-label="Quick links">
                <p class="lw-footer__label">Quick Links</p>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('services.work') }}">Work With Me</a></li>
                    <li><a href="{{ route('work') }}">Case Studies</a></li>
                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ route('insights') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </nav>

            <nav class="lw-footer__nav" aria-label="Services">
                <p class="lw-footer__label">Services</p>
                <ul>
                    <li><a href="{{ route('services') }}#editorial-content-strategy">Editorial &amp; Content Strategy</a></li>
                    <li><a href="{{ route('services.brands') }}#seo-content-copywriting">SEO Content &amp; Copywriting</a></li>
                    <li><a href="{{ route('services.brands') }}#digital-pr">Digital PR &amp; Outreach</a></li>
                    <li><a href="{{ route('services.authors') }}#book-marketing">Author &amp; Book Marketing</a></li>
                </ul>
            </nav>

            <nav class="lw-footer__nav" aria-label="Audiences">
                <p class="lw-footer__label">For</p>
                <ul>
                    <li><a href="{{ route('services.authors') }}">Authors &amp; Publishers</a></li>
                    <li><a href="{{ route('services.brands') }}">Businesses &amp; Brands</a></li>
                </ul>
                <p class="lw-footer__label lw-footer__label--quick">Legal</p>
                <ul>
                    <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                </ul>
            </nav>
        </div>

        <div class="lw-footer__contact-strip">
            <div class="lw-footer__contact-item">
                <span class="lw-footer__contact-icon" aria-hidden="true">⌖</span>
                <div><p class="lw-footer__label">Studio</p><p>{!! nl2br(e($footerAddress)) !!}</p></div>
            </div>
            <div class="lw-footer__contact-item">
                <span class="lw-footer__contact-icon" aria-hidden="true">✉</span>
                <div><p class="lw-footer__label">Email</p><a href="mailto:{{ $footerEmail }}">{{ $footerEmail }}</a></div>
            </div>
            <div class="lw-footer__contact-item">
                <span class="lw-footer__contact-icon" aria-hidden="true">◎</span>
                <div><p class="lw-footer__label">Website</p><a href="{{ route('home') }}">www.linkingwordz.com</a></div>
            </div>
        </div>

        <div class="lw-footer__bottom">
            <p>© {{ now()->year }} LinkingWordz. All rights reserved.</p>
        </div>
        </div>
    </div>
</footer>
