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
                    <img src="/images/live/live-logo-light.png" alt="LinkingWordz">
                </a>
                <p class="lw-footer__studio">Editorial Content Studio</p>
                <span class="lw-footer__rule" aria-hidden="true"></span>
                <p class="lw-footer__statement">We write with the right words for the right clients — authors and businesses whose voice deserves to be heard.</p>
                <div class="lw-footer__socials" aria-label="Social links">
                    <a href="https://www.linkedin.com/" target="_blank" rel="noreferrer" aria-label="LinkedIn">in</a>
                    <a href="https://twitter.com/" target="_blank" rel="noreferrer" aria-label="Twitter">𝕏</a>
                    <a href="https://www.instagram.com/linkingwordz/" target="_blank" rel="noreferrer" aria-label="Instagram">◎</a>
                    <a href="mailto:hello@linkingwordz.com" aria-label="Email LinkingWordz">✉</a>
                </div>
            </div>

            <nav class="lw-footer__nav" aria-label="Pages">
                <p class="lw-footer__label">Pages</p>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('services.authors') }}">Authors &amp; Publishers</a></li>
                    <li><a href="{{ route('services.brands') }}">Businesses &amp; Brands</a></li>
                    <li><a href="{{ route('services.work') }}">Work With Me</a></li>
                    <li><a href="{{ route('work') }}">Work / Case Studies</a></li>
                    <li><a href="{{ route('insights') }}">Insights / Blog</a></li>
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

            <nav class="lw-footer__nav" aria-label="Audiences and quick links">
                <p class="lw-footer__label">For</p>
                <ul>
                    <li><a href="{{ route('services.authors') }}">Authors &amp; Publishers</a></li>
                    <li><a href="{{ route('services.brands') }}">Businesses &amp; Brands</a></li>
                </ul>
                <p class="lw-footer__label lw-footer__label--quick">Quick Links</p>
                <ul>
                    <li><a href="{{ route('work.show', ['slug' => 'kiran-lasiyal']) }}">Case Study Detail</a></li>
                    <li><a href="{{ route('insights') }}">Blog Article</a></li>
                    <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('/terms-and-conditions') }}">Terms &amp; Conditions</a></li>
                    <li><a href="{{ url('/404') }}">404 Page</a></li>
                </ul>
            </nav>
        </div>

        <div class="lw-footer__contact-strip">
            <div class="lw-footer__contact-item">
                <span class="lw-footer__contact-icon" aria-hidden="true">⌖</span>
                <div><p class="lw-footer__label">Studio</p><p>Ahmedabad, Gujarat<br>India</p></div>
            </div>
            <div class="lw-footer__contact-item">
                <span class="lw-footer__contact-icon" aria-hidden="true">✉</span>
                <div><p class="lw-footer__label">Email</p><a href="mailto:hello@linkingwordz.com">hello@linkingwordz.com</a></div>
            </div>
            <div class="lw-footer__contact-item">
                <span class="lw-footer__contact-icon" aria-hidden="true">◎</span>
                <div><p class="lw-footer__label">Website</p><a href="{{ route('home') }}">www.linkingwordz.com</a></div>
            </div>
        </div>

        <div class="lw-footer__bottom">
            <p>© {{ now()->year }} LinkingWordz. All rights reserved.</p>
            <p>Human-written. Research-backed. Built around your brand.</p>
        </div>
        </div>
    </div>
</footer>
