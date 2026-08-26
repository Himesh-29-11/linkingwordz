@extends('layouts.app')

@section('title', 'About Shruti Bhatt — LinkingWordz')

@section('content')
    <div class="lw-page lw-about-page">
        <section class="lw-abx-hero" aria-labelledby="about-title">
            <div class="lw-abx-hero__media">
                <img src="{{ asset('images/about/about-portrait.jpg') }}" alt="Shruti Bhatt at a cafe">
            </div>
            <div class="lw-container">
                <div class="lw-abx-hero__card">
                    <p class="lw-eyebrow">About Shruti Bhatt</p>
                    <h1 id="about-title">Hey there! I'm Shruti Bhatt, your friendly editor &amp; nerd.</h1>
                    <p>When I'm not busy correcting 'their' to 'they're', you can find me indulging in a good book or sipping on some fancy coffee!</p>
                    <p class="lw-abx-hero__role">Copywriter, Editor &amp; Proofreader</p>
                    <a href="{{ route('contact') }}" class="lw-btn lw-btn--primary">Let's Chat! <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                </div>
            </div>
        </section>

        <section class="lw-abx-story" aria-labelledby="journey-title">
            <div class="lw-container lw-abx-story__grid">
                <figure class="lw-abx-story__portrait">
                    <img src="{{ asset('images/about/about-grammar.jpg') }}" alt="Reach out to Linkingwordz for professional proofreading, copyediting, and copywriting services.">
                </figure>
                <div class="lw-abx-story__copy">
                    <p class="lw-eyebrow">My Journey so far...</p>
                    <h2 id="journey-title">Hooked on languages, then on the work of words.</h2>
                    <p>Ever since I finished my graduation and visited Dubai to looking for a job, I've been hooked on different types of languages &amp; cultures.</p>
                    <p>After completing Masters degree, I started teaching spoken English to different ages of students. Then, I became a lecturer as Business communication, Accounting &amp; finance with my Masters in Accounting for 2.5 years.</p>
                    <p>After Exploring that journey &amp; completing my M.Phil, I have started my corporate journey in Google, PhonePe, Spotify, Snapchat, Facebook, etc. well-known clients as a Regional language Translator, Reviewer and Team lead on a full-time as well as freelance basis in Bangalore for 7+ years.</p>
                    <p>Although, I realized that I wanted to immersing in the words of writing! That's when I came across this Editing &amp; Proofreading field and dived right into it. Got certified from Edit Republic as well as HPA. Fast forward a few years, and now, I'm a professional proofreader since last 2 years, with my Instagram Brand Linkingwordz; I offer professional copy editing &amp; proofreading services for books, manuscripts, and business documents. My book proofreading ensures that your writing is error-free and polished.</p>
                    <p>I also Offer B2B Copy writing &amp; Content writing services. You can ping me at the right corner at the down and I will send you my portfolio with all the work samples and analytics. Other details are on the Services page.</p>
                </div>
            </div>
        </section>

        <section class="lw-abx-work" aria-labelledby="work-title">
            <div class="lw-container lw-abx-work__grid">
                <div>
                    <p class="lw-eyebrow">The work</p>
                    <h2 id="work-title">There’s always a moment when the editor thinks to themself, This is it.</h2>
                    <p>This is the heart of the book. These words are going to create an immense impact on someone’s life.</p>
                    <p class="lw-abx-pull">Those are the moments I live for.</p>
                    <p>Whether you're a writer with tons of experience or just starting out; I'm here to help you make your work even better. With a keen eye and a passion for language, I'll carefully review your content, making sure they're error-free, clear, and impactful.</p>
                    <p>When your manuscript hits my inbox, you better believe I’m creating a custom package just for your project!</p>
                </div>
                <figure>
                    <img src="{{ asset('images/about/about-desk.jpeg') }}" alt="Shruti working on a manuscript at her laptop">
                </figure>
            </div>
        </section>

        <section class="lw-abx-know" aria-labelledby="know-title">
            <div class="lw-abx-know__wash" aria-hidden="true"></div>
            <div class="lw-container">
                <h2 id="know-title">Get to know Me!</h2>
                <div class="lw-abx-know__phones">
                    <figure>
                        <img src="{{ asset('images/about/about-ig-1.png') }}" alt="Get to know Me">
                    </figure>
                    <figure>
                        <img src="{{ asset('images/about/about-ig-2.png') }}" alt="Get to know Me">
                    </figure>
                    <figure>
                        <img src="{{ asset('images/about/about-ig-3.png') }}" alt="Get to know Me">
                    </figure>
                </div>
            </div>
        </section>

        <section class="lw-abx-genres" aria-labelledby="genres-title">
            <div class="lw-container">
                <h2 id="genres-title">Few Genres I love to read/work on...</h2>
                <div class="lw-abx-genres__grid">
                    <article>
                        <h3>Non-fiction:</h3>
                        <ul>
                            <li>Philosophy</li>
                            <li>Health &amp; wellness</li>
                            <li>Self-help</li>
                            <li>Travel guides</li>
                            <li>Business &amp; economics</li>
                            <li>Language &amp; Culture</li>
                            <li>Memoirs &amp; biographies, etc.</li>
                        </ul>
                    </article>
                    <article>
                        <h3>Fiction:</h3>
                        <ul>
                            <li>Fantasy</li>
                            <li>Mystery &amp; Thriller</li>
                            <li>Young Adult</li>
                            <li>Science Fiction</li>
                            <li>Historical fiction</li>
                            <li>Romance</li>
                            <li>Action &amp; Adventure, etc.</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <section class="lw-abx-posts" aria-labelledby="posts-title">
            <div class="lw-container">
                <h2 id="posts-title">Few Instagram posts people loved the most!</h2>
                <div class="lw-abx-posts__grid">
                    <a href="https://www.instagram.com/linkingwordz/" target="_blank" rel="noreferrer"><img src="{{ asset('images/about/about-post-1.png') }}" alt="Linkingwordz Instagram post"></a>
                    <a href="https://www.instagram.com/p/C2SB8oeRUd3/" target="_blank" rel="noreferrer"><img src="{{ asset('images/about/about-post-2.png') }}" alt="Linkingwordz Instagram post"></a>
                    <a href="https://www.instagram.com/p/CzbKRY_samg/" target="_blank" rel="noreferrer"><img src="{{ asset('images/about/about-post-3.png') }}" alt="Linkingwordz Instagram post"></a>
                    <div class="lw-abx-posts__reel">
                        <video src="{{ asset('videos/about-reel-1.mp4') }}" controls playsinline preload="metadata" title="Linkingwordz reel"></video>
                    </div>
                    <div class="lw-abx-posts__reel">
                        <video src="{{ asset('videos/about-reel-2.mp4') }}" controls playsinline preload="metadata" title="Linkingwordz reel"></video>
                    </div>
                </div>
            </div>
        </section>

        <section class="lw-final-cta" aria-labelledby="about-cta-title">
            <div class="lw-container lw-final-cta__inner">
                <span class="lw-final-cta__icon" aria-hidden="true">@include('partials.publisher-icon', ['name' => 'chat'])</span>
                <div class="lw-final-cta__copy">
                    <h2 id="about-cta-title">Let's Chat!</h2>
                    <p>Reach out to Linkingwordz for professional proofreading, copyediting, and copywriting services.</p>
                </div>
                <div class="lw-final-cta__actions">
                    <a href="{{ route('contact') }}" class="lw-btn lw-btn--secondary">Let's Chat! <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                </div>
            </div>
        </section>
    </div>
@endsection
