@extends('layouts.app')

@section('title', 'Case Study — Kiran Lasiyal | LinkingWordz')

@section('content')
    @php $work = $workItems[0]; @endphp
    <article class="lw-cs">
        <header class="lw-cs-hero">
            @include('partials.ornament')
            <div class="lw-container lw-cs-hero__grid">
                <div>
                    <p class="lw-eyebrow">Case study</p>
                    <h1>How Strategic Social Media Editing Transformed Kiran's LinkedIn Journey</h1>
                    <p class="lw-cs-hero__lede">A tale of exceptional growth</p>
                    <dl class="lw-cs-hero__meta">
                        <div><dt>Client</dt><dd>Kiran Lasiyal</dd></div>
                        <div><dt>Role</dt><dd>Social Media Manager &amp; video editor</dd></div>
                        <div><dt>Focus</dt><dd>LinkedIn personal brand</dd></div>
                    </dl>
                </div>
                <figure class="lw-cs-hero__photo">
                    <img src="{{ asset('images/work/kiran.jpg') }}" alt="Kiran Lasiyal">
                    <figcaption><strong>Kiran Lasiyal</strong>Social Media Manager &amp; video editor</figcaption>
                </figure>
            </div>
        </header>

        <section class="lw-cs-overview">
            <div class="lw-container lw-cs-overview__grid">
                <div>
                    <p class="lw-eyebrow">Client overview</p>
                    <h2>Positioning a standout content creator with a distinctive voice.</h2>
                </div>
                <div>
                    <p>Kiran Lasiyal is a personal branding expert who helps founders, finance professionals, and business coaches build their brand presence through social media.</p>
                    <p>Kiran, a social media manager &amp; video editor with four years of experience, wanted a unique LinkedIn post style to enhance her personal brand. When she approached me, we delved into her work, insights, and recent analytics to craft a strategy tailored to her goals.</p>
                    <p>Our primary objective was to boost Kiran’s visibility on LinkedIn within a short timeframe. We focused on positioning her as a standout content creator &amp; build an authority with a distinctive voice, a sharp content strategy, and the ability to captivate a wide audience.</p>
                </div>
            </div>
        </section>

        <section class="lw-cs-stats">
            <div class="lw-container lw-cs-stats__grid">
                <div><strong>26%</strong><span>Post impressions in a week</span></div>
                <div><strong>9.3%</strong><span>Follower growth</span></div>
                <div><strong>20 hrs</strong><span>Turnaround</span></div>
                <div><strong>0</strong><span>Revisions needed</span></div>
            </div>
        </section>

        <section class="lw-cs-strategy">
            <div class="lw-container">
                <p class="lw-eyebrow">Strategy implementation</p>
                <h2>What we did</h2>
                <div class="lw-cs-strategy__grid">
                    <article>
                        <span class="lw-cs-strategy__icon">@include('partials.publisher-icon', ['name' => 'edit'])</span>
                        <h3>Content Optimization</h3>
                        <p>Kiran's existing content, content styling was analyzed and improvements were made to titles, descriptions, and captions to make them more engaging and shareable. Incorporating story telling techniques and captivating visuals helped capture viewer's attention and encourage sharing.</p>
                    </article>
                    <article>
                        <span class="lw-cs-strategy__icon">@include('partials.publisher-icon', ['name' => 'chat'])</span>
                        <h3>Increased Engagement</h3>
                        <p>Kiran responded promptly to all the comments, direct messages, also started initiating conversations, asking questions and addressing queries. This built a stronger connection with her followers and increased audience loyalty.</p>
                    </article>
                    <article>
                        <span class="lw-cs-strategy__icon">@include('partials.publisher-icon', ['name' => 'article'])</span>
                        <h3>Delivery of final copy</h3>
                        <p>Kiran's existing content was her final draft when it came to me. I have analyzed it properly with each and every sentences to make it more catchy. Also, commented a few times to add some famous phrases to go with that content which will end up relate more with her target audience. At last, by applying all the suggestions, I have created another document copy to show her the final content and delivered within EOD so that she can plan out that Edited copy with her strategy schedule. No revision has come to me out of the whole contract. She has adopted the final version throughout by her on LinkedIn post.</p>
                    </article>
                    <article>
                        <span class="lw-cs-strategy__icon">@include('partials.publisher-icon', ['name' => 'calendar'])</span>
                        <h3>Content Schedule</h3>
                        <p>Closely monitoring trends and viral content in her niche, we guided Kiran by creating content that aligned with her niche trends. Since Kiran was already an experienced social media manager, chatting about her content calendar felt like brainstorming with a friend. We hopped on a call, tossed around ideas, and nailed down the kind of posts that would bring in more sales and the right audience. With those golden insights in hand, I put together a content calendar that wasn’t just a plan—it was a game-changer for her LinkedIn presence!</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="lw-cs-shots">
            <div class="lw-container">
                <p class="lw-eyebrow">The work</p>
                <h2>Edited copy, in context.</h2>
                <div class="lw-cs-shots__grid">
                    <figure><img src="{{ asset('images/work/kiran-shot-1.png') }}" alt="LinkedIn editing screenshot from Kiran's case study"></figure>
                    <figure><img src="{{ asset('images/work/kiran-shot-2.png') }}" alt="LinkedIn content screenshot from Kiran's case study"></figure>
                </div>
            </div>
        </section>

        <section class="lw-cs-quote">
            <div class="lw-container lw-cs-quote__inner">
                <p class="lw-eyebrow">Testimonial by Kiran</p>
                <blockquote>
                    <p>Working with Linkingwordz was a game-changer for my content writing journey. She not only fine-tuned my 3 LinkedIn posts with meticulous editing but also transformed them into impactful pieces that resonated with my audience. Her keen eye for detail and strategic refinements boosted my post impressions by 26% in a week and increased my follower count by 9.3%.</p>
                    <p>The entire process was seamless, with clear feedback in track changes and a polished final version delivered within an impressive 20-hour turnaround. If you’re looking for an editor who elevates your content effortlessly, she’s the one to trust!</p>
                </blockquote>
                <cite>Kiran Lasiyal · Social Media Manager &amp; video editor</cite>
            </div>
        </section>

        <section class="lw-final-cta" aria-labelledby="cs-cta">
            <div class="lw-container lw-final-cta__inner">
                <span class="lw-final-cta__icon" aria-hidden="true">@include('partials.publisher-icon', ['name' => 'edit'])</span>
                <div class="lw-final-cta__copy">
                    <h2 id="cs-cta">Want this kind of clarity for your content?</h2>
                    <p>Book a free discovery call and we'll figure out the next right step.</p>
                </div>
                <div class="lw-final-cta__actions">
                    <a href="{{ route('contact') }}" class="lw-btn lw-btn--secondary">Book a Free Discovery Call <span class="lw-btn__arrow" aria-hidden="true">→</span></a>
                </div>
            </div>
        </section>
    </article>
@endsection
