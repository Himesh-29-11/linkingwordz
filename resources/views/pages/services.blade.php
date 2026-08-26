@extends('layouts.app')

@section('title', 'Services — LinkingWordz')

@section('content')
    <div class="lw-page lw-svc">
        <header class="lw-svc-hero">
            @include('partials.ornament')
            <div class="lw-container lw-svc-hero__inner">
                <div class="lw-svc-hero__copy">
                    <p class="lw-eyebrow">Services</p>
                    <h1>5 content problems. 1 solution. Built for your brand.</h1>
                    <p>Most brands don't have a content problem. They have a clarity problem — about what to say, where to say it, and how to make it work together.</p>
                    <p>At Linkingwordz, we handle your website, your blogs, your LinkedIn presence, your book, and your editorial work — all under one roof. Human-written. Research-backed. Built for the audience you actually want to reach.</p>
                    <div class="lw-svc-hero__actions">
                        <a class="lw-btn lw-btn--primary" href="https://calendly.com/linkingwordz/30min" target="_blank" rel="noreferrer">Book a free discovery call</a>
                        <span>No obligation. Not even after 2 calls.</span>
                    </div>
                </div>
                <ul class="lw-fill-tiles">
                    <li><span>@include('partials.publisher-icon', ['name' => 'website'])</span><b>01</b><em>Website</em></li>
                    <li><span>@include('partials.publisher-icon', ['name' => 'article'])</span><b>02</b><em>Blogs</em></li>
                    <li><span>@include('partials.publisher-icon', ['name' => 'linkedin'])</span><b>03</b><em>LinkedIn</em></li>
                    <li><span>@include('partials.publisher-icon', ['name' => 'book'])</span><b>04</b><em>Book</em></li>
                    <li><span>@include('partials.publisher-icon', ['name' => 'edit'])</span><b>05</b><em>Editorial</em></li>
                    <li><span>@include('partials.publisher-icon', ['name' => 'spark'])</span><b>+</b><em>Human-written</em></li>
                </ul>
            </div>
        </header>

        <section class="lw-svc-journey">
            <div class="lw-container">
                <p class="lw-eyebrow">Does any of this sound familiar?</p>
                <h2>These are the 5 problems we solve. Every single day.</h2>
                <ol class="lw-svc-problems">
                    <li>“My website doesn't represent what I actually do.”</li>
                    <li>“I'm not showing up on Google — or anywhere.”</li>
                    <li>“My LinkedIn is either inconsistent or completely silent.”</li>
                    <li>“I have a book in my head but no idea how to get it out.”</li>
                    <li>“My content is written — it just needs someone to sharpen it.”</li>
                </ol>
            </div>
        </section>

        <section class="lw-svc-block" id="website">
            <div class="lw-container">
                <p class="lw-svc-num">01 — Your Website</p>
                <h2>Your brand's first impression happens before you say a word.</h2>
                <p class="lw-svc-sub">Where credibility lands — or disappears.</p>
                <div class="lw-svc-prose">
                    <p>Whether you are a coach, a consultant, a therapist, or an entrepreneurial company — your website is where credibility either lands or disappears. We don't just write your website copy. We handle content strategy, the actual writing, design direction, and development coordination altogether. So you don't have to manage five different people to launch one website.</p>
                </div>
                <ul class="lw-svc-check lw-svc-check--wide">
                    <li>Content strategy + full website copy</li>
                    <li>Website design and development</li>
                    <li>Domain selection guidance and technical onboarding</li>
                    <li>Platform recommendation (Wix, WordPress, Squarespace, etc.)</li>
                    <li>Technical support post-launch</li>
                </ul>
                <p class="lw-svc-aside">This is a 3-month engagement. We onboard you, build with you, and hand over with full support.</p>
            </div>
        </section>

        <section class="lw-svc-block lw-svc-block--alt" id="blogs">
            <div class="lw-container">
                <p class="lw-svc-num">02 — Your Blogs</p>
                <h2>The content that keeps working long after you've stopped posting.</h2>
                <p class="lw-svc-sub">SEO + AEO-optimised. Built to be found.</p>
                <div class="lw-svc-prose">
                    <p>Blogs are how your ideal clients find you — not just today, but six months from now. We write SEO and AEO-optimised blogs that answer the exact questions your audience is already searching for. For coaches and service brands, that means blogs that position you as the go-to expert in your niche. For authors, we write book promotional blogs that turn your work into something commercially discoverable — reaching your ideal readers through search, before they've even heard your name.</p>
                    <p>Ideally, 12 blogs give your brand a strong organic foundation and a meaningful SEO boost.</p>
                </div>
                <ul class="lw-svc-check lw-svc-check--wide">
                    <li>Research-led topic selection (based on your niche + SEO gaps)</li>
                    <li>SEO + AEO optimised long-form blog writing</li>
                    <li>Book promotional blogs (for authors)</li>
                    <li>Internal linking strategy</li>
                    <li>Ready-to-publish formatting</li>
                </ul>
            </div>
        </section>

        <section class="lw-svc-block" id="linkedin">
            <div class="lw-container">
                <p class="lw-svc-num">03 — Your LinkedIn Presence</p>
                <h2>Your most powerful professional platform. Most people treat it like a notice board.</h2>
                <p class="lw-svc-sub">A sales conversation happening without you in the room.</p>
                <div class="lw-svc-prose">
                    <p>LinkedIn is where buying decisions are made quietly. A potential client reads three of your posts before they ever reach out. Which means your LinkedIn content isn't just visibility — it's a sales conversation happening without you in the room.</p>
                    <p>We offer a dedicated 3-month LinkedIn Content Package — standalone, not bundled with any other service. We learn your voice, your story, and your professional positioning. Then we write it. You post it. Your audience grows.</p>
                </div>
                <ul class="lw-svc-check lw-svc-check--wide">
                    <li>Voice discovery session (we write in your voice, not ours)</li>
                    <li>Content calendar — topics, hooks, post structure</li>
                    <li>Written posts — stories, insights, thought leadership, authority content</li>
                    <li>Strategic use of POV framing, storytelling, and engagement hooks</li>
                    <li>3-month minimum engagement (that's how long it takes to see real traction)</li>
                </ul>
            </div>
        </section>

        <section class="lw-svc-block lw-svc-block--alt" id="book">
            <div class="lw-container">
                <p class="lw-svc-num">04 — Your Book</p>
                <h2>The most credible thing a thought leader can have. Most never finish it.</h2>
                <p class="lw-svc-sub">Your ideas. Your voice. On the page.</p>
                <div class="lw-svc-prose">
                    <p>Whether you want to document your journey, build authority in your industry, or publish something your clients will find on their shelves — we help you write it. As ghostwriters, we bring your ideas, your voice, and your experience to the page. You own it entirely.</p>
                    <p>We also have deep experience in the publishing process — from manuscript to market — and we work with indie and traditionally published authors alike. Many established coaches, consultants, and corporate brands now keep a book on the boardroom table. It is not a vanity project. It is a business asset.</p>
                </div>
                <ul class="lw-svc-check lw-svc-check--wide">
                    <li>Ghostwriting — business books, memoirs, brand stories, thought leadership</li>
                    <li>Copyediting and proofreading</li>
                    <li>Book Translation</li>
                    <li>Publishing process knowledge (traditional + self-publishing)</li>
                </ul>
                <p class="lw-svc-aside"><a href="{{ route('services.authors') }}">For Authors &amp; Publishers — full editorial support details →</a></p>
            </div>
        </section>

        <section class="lw-svc-block" id="editorial">
            <div class="lw-container">
                <p class="lw-svc-num">05 — Your Editorial Support</p>
                <h2>Good ideas deserve clean, publication-ready execution.</h2>
                <p class="lw-svc-sub">A professional eye, quietly in the background.</p>
                <div class="lw-svc-prose">
                    <p>If your content is already written but needs a professional eye before it goes out — this is where we work quietly in the background. We copyedit, proofread, and refine manuscripts, white papers, academic journals, business documents, and marketing materials.</p>
                    <p>Our editorial work goes deeper because of the research foundation behind it. With an M.Phil in Management and 9+ years of hands-on experience in finance, psychology, and mental health content — we don't just fix grammar. We understand the subject matter we're editing.</p>
                </div>
                <ul class="lw-svc-check lw-svc-check--wide">
                    <li>Independent authors before submission or self-publishing</li>
                    <li>Publishers and literary agents</li>
                    <li>Corporate brands and businesses</li>
                    <li>Academic institutions and journals</li>
                </ul>
                <p class="lw-svc-aside"><a href="{{ route('services.authors') }}">For Authors &amp; Publishers — full editorial support details →</a></p>
            </div>
        </section>

        <section class="lw-svc-block lw-svc-block--alt">
            <div class="lw-container">
                <p class="lw-eyebrow">What makes working with us different</p>
                <h2>This is what you're actually getting.</h2>
                <div class="lw-svc-subjects">
                    <article>
                        <h3>Research Is Our Foundation</h3>
                        <p>An M.Phil in Management isn't a qualification we mention in passing. It means every brief is approached with genuine intellectual rigour — not surface-level assumptions. You get content that's thought through, not just written fast.</p>
                    </article>
                    <article>
                        <h3>5–10 Clients At A Time. That's It.</h3>
                        <p>We deliberately limit how many clients we take on. Not because we can't handle more — but because your brand deserves full attention, not a slot in a production queue. When you're with us, you have our focus.</p>
                    </article>
                    <article>
                        <h3>We Deliver On Timelines. With Proof.</h3>
                        <p>We've written 10 blogs per client for 3 different clients — in a single month. Without compromising research quality or voice consistency. Deadlines aren't a pressure point for us. They're part of how we work.</p>
                    </article>
                    <article>
                        <h3>Human-Generated. Always.</h3>
                        <p>In a world full of AI-generated content that sounds like everyone else, we write every word by hand. Research-based copy. Real voice. Real thinking. That's not a differentiator we offer — it's a standard we hold.</p>
                    </article>
                    <article>
                        <h3>Content + Development. Together.</h3>
                        <p>Most agencies hand you copy and say goodbye. Most developers ask you for copy and wait. We sit in both rooms. Content strategy, writing, design direction, and development coordination happen under one engagement.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="lw-svc-gap">
            <div class="lw-container">
                <p class="lw-eyebrow">Clarity</p>
                <h2>This is content marketing. It's not the same as PR.</h2>
                <div class="lw-svc-split">
                    <article>
                        <h3>Content Marketing</h3>
                        <p>Content marketing is the long game. It builds your brand's credibility, searchability, and trust — over time, through content you own. A well-written blog lives on your website for years, answering the same question your ideal client is searching for at 11pm on a Tuesday. A LinkedIn post in your voice builds familiarity before anyone books a call. Content marketing doesn't interrupt your audience — it earns their attention, answers their questions, and positions you as the obvious choice. It influences real buying decisions. Quietly. Consistently.</p>
                    </article>
                    <article>
                        <h3>PR</h3>
                        <p>PR is about earned media — getting your name into publications, press, and platforms you don't own. It's valuable for visibility and reputation, especially at scale. But PR without a content foundation is like sending someone to a party with no business card. They hear your name and then can't find you. PR tells people you exist. Content marketing shows them why you matter — and keeps showing them, long after the press mention fades.</p>
                    </article>
                </div>
                <p class="lw-svc-pull">PR puts your name in the room. Content marketing makes them remember why they came to find you.</p>
            </div>
        </section>

        <section class="lw-svc-journey">
            <div class="lw-container">
                <p class="lw-eyebrow">A framework before we begin</p>
                <h2>Before any content strategy — know your one purpose right now</h2>
                <p class="lw-svc-lede">At Linkingwordz, we believe every brand needs a primary focus at every stage of its journey. You can't grow your followers, collect testimonials, and drive engagement all at once — not effectively. So before we write a single word for your brand, we ask you this: What does your brand most need right now?</p>
                <div class="lw-svc-trio">
                    <article>
                        <h3>Grow Your Followers</h3>
                        <p>You have something valuable to say. But not enough people are listening yet. This phase is about expanding your reach — getting in front of new audiences who don't know you exist. Content here is built to attract, introduce, and invite. The goal is growth in numbers, but the strategy is built on relevance and consistency.</p>
                    </article>
                    <article>
                        <h3>Build Social Proof</h3>
                        <p>You have happy clients. But you're not leveraging what they've said about you. This phase is about turning your results into trust signals — testimonials, case studies, reviews, and client stories that speak to the next person sitting on the fence. This content doesn't sell. It convinces.</p>
                    </article>
                    <article>
                        <h3>Increase Engagement</h3>
                        <p>You have an audience. But they scroll past without responding. This phase is about deepening the relationship — sparking conversations, driving comments and shares, and making your content feel worth engaging with. Engagement signals credibility to algorithms AND to humans.</p>
                    </article>
                </div>
                <p class="lw-svc-aside">Not sure which purpose is right for you right now? That's exactly what the discovery call is for — we figure it out together. It's free. No agenda. No pressure to buy.</p>
            </div>
        </section>

        <section class="lw-svc-paths">
            <div class="lw-container">
                <p class="lw-eyebrow">Two paths. Same standard of work.</p>
                <div class="lw-svc-paths__grid" style="margin-top:1.5rem">
                    <article class="lw-svc-path lw-svc-path--teal">
                        <h2>For Authors &amp; Publishers</h2>
                        <p>Independent authors, publishing houses, literary agents, academic journals, and corporate brands producing long-form work.</p>
                        <ul>
                            <li>Ghostwriting</li>
                            <li>Copyediting</li>
                            <li>Proofreading</li>
                            <li>Book Promotional Blogs</li>
                            <li>Publishing Guidance</li>
                            <li>Translation</li>
                        </ul>
                        <a href="{{ route('services.authors') }}" class="lw-btn lw-btn--light">See full details <span aria-hidden="true">→</span></a>
                    </article>
                    <article class="lw-svc-path lw-svc-path--mauve">
                        <h2>For Coaches, Brands &amp; Businesses</h2>
                        <p>Coaches, therapists, consultants, financial advisors, psychologists, wellness professionals, entrepreneurs, and SMEs.</p>
                        <ul>
                            <li>Website Content + Development</li>
                            <li>SEO Blogs</li>
                            <li>LinkedIn Writing</li>
                            <li>Thought Leadership</li>
                            <li>Editorial Support</li>
                        </ul>
                        <a href="{{ route('services.brands') }}" class="lw-btn lw-btn--light">See full details <span aria-hidden="true">→</span></a>
                    </article>
                </div>
            </div>
        </section>

        <section class="lw-svc-quotes">
            <div class="lw-container">
                <p class="lw-eyebrow">Client love</p>
                <h2>What our clients say</h2>
                <div class="lw-svc-trio">
                    <blockquote>
                        <p>“I just finished going over chapter one! Thank you so much for your input, I used quite a few of your suggestions — probably about 85% of them. Thank you for reviewing this for me.”</p>
                        <cite>Eve Miller, Author</cite>
                    </blockquote>
                    <blockquote>
                        <p>“Shruti worked with us on proofreading our product notes and a few blogs. She is a thorough professional, punctual with deadlines, and most importantly an expert in her field. We wish you all the best for all your future endeavors.”</p>
                        <cite>Paintphotographs</cite>
                    </blockquote>
                    <blockquote>
                        <p>“Shruti has been working as a reviewer in my team for more than 2.5 years. She is a team player and has a very good command over the language. On-time delivery, accuracy, high standard work ethics are some of her bright qualities. She is an asset to any team she works for.”</p>
                        <cite>Rushabh Shah</cite>
                    </blockquote>
                </div>
            </div>
        </section>
    </div>
@endsection
