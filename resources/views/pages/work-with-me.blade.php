@extends('layouts.app')

@section('title', 'Work With Me — LinkingWordz')

@section('content')
    <div class="lw-page lw-wwm">
        <header class="lw-wwm-hero">
            @include('partials.ornament')
            <div class="lw-container lw-wwm-hero__grid">
                <div>
                    <p class="lw-eyebrow">For new freelancers</p>
                    <h1>Started freelancing but feeling stuck?</h1>
                    <p class="lw-wwm-hero__lede">In 45 minutes, we'll go from confusion to a clear 30-day action plan — built around your skills, your strengths, and where you actually are right now.</p>
                    <ul class="lw-wwm-pills">
                        <li>45-minute session</li>
                        <li>1:1 with Shruti</li>
                        <li>Via Topmate</li>
                    </ul>
                    <div class="lw-wwm-hero__actions">
                        <a class="lw-btn lw-btn--primary" href="https://topmate.io/shrutibhatt/1835899" target="_blank" rel="noreferrer">Book on Topmate</a>
                        <span>No obligation. Not even after 2 calls.</span>
                    </div>
                </div>
                <figure class="lw-wwm-hero__photo">
                    <img src="{{ asset('images/shruti-founder.jpg') }}" alt="Shruti Bhatt">
                    <figcaption>
                        <strong>Shruti Bhatt</strong>
                        Mentor · Writer · Founder
                    </figcaption>
                </figure>
            </div>
        </header>

        <section class="lw-wwm-outcomes">
            <div class="lw-container">
                <p class="lw-eyebrow">What happens in 45 minutes</p>
                <h2>One session. Three things you leave with.</h2>
                <p class="lw-wwm-lede">Most freelancers know what they want to do — they just don't know what to do next. That's what this session fixes.</p>
                <div class="lw-wwm-outcomes__grid">
                    <article>
                        <span>01</span>
                        <h3>Clarity on where you are</h3>
                        <p>We map exactly where you are in your freelance journey — what's working, what's blocking you, and what you're overthinking. No vague advice. Real assessment.</p>
                    </article>
                    <article>
                        <span>02</span>
                        <h3>A plan built around you</h3>
                        <p>Not a generic checklist. A 30-day action plan specific to your skills, your niche, and the stage you're actually at — so you know exactly what to do next week and the week after.</p>
                    </article>
                    <article>
                        <span>03</span>
                        <h3>Confidence to move forward</h3>
                        <p>You'll leave the session knowing your next move — with the clarity that comes from talking to someone who has already navigated the path you're on.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="lw-wwm-who">
            <div class="lw-container">
                <p class="lw-eyebrow">Who this is for</p>
                <h2>This session is built for you if —</h2>
                <div class="lw-wwm-who__grid">
                    <article>
                        <h3>You've just started</h3>
                        <p>You've taken the leap into freelancing but the first few weeks feel overwhelming. You're not sure how to find clients, how to price, or where to even begin building your presence.</p>
                    </article>
                    <article>
                        <h3>You're pivoting your niche</h3>
                        <p>You've been freelancing in one area but want to move into content writing, copyediting, or another field — and need someone who's done it to help you map the transition.</p>
                    </article>
                    <article>
                        <h3>You're stuck in the middle</h3>
                        <p>You have a skill, maybe even a few clients — but growth has stalled. You're working hard and not getting traction. Something isn't clicking and you can't figure out what.</p>
                    </article>
                    <article>
                        <h3>You need a reality check</h3>
                        <p>You've been going in circles — watching videos, reading threads, consuming advice — but nothing is moving. You need one honest conversation.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="lw-wwm-how">
            <div class="lw-container">
                <p class="lw-eyebrow">How it works</p>
                <h2>Simple. No fluff. Just progress.</h2>
                <p class="lw-wwm-lede">This isn't a coaching programme or a long-term commitment. It's one focused session with a clear output — a plan you can act on the same day.</p>
                <ol class="lw-wwm-how__list">
                    <li>
                        <span>1</span>
                        <div>
                            <h3>Book your slot on Topmate</h3>
                            <p>Head to Topmate and choose a time that works for you. You'll get a confirmation with a short pre-session form — so we don't waste a minute of the 45.</p>
                        </div>
                    </li>
                    <li>
                        <span>2</span>
                        <div>
                            <h3>Fill in the pre-session form</h3>
                            <p>Tell me where you are, what's not working, and what you most need clarity on. This lets me come prepared — with specific thoughts, not generic advice.</p>
                        </div>
                    </li>
                    <li>
                        <span>3</span>
                        <div>
                            <h3>We meet for 45 minutes</h3>
                            <p>An honest, structured conversation. We map your situation, identify what's blocking you, and build your 30-day action plan together in real time.</p>
                        </div>
                    </li>
                    <li>
                        <span>4</span>
                        <div>
                            <h3>You leave with a clear next move</h3>
                            <p>No vague takeaways. You'll have specific actions for the next 30 days — written, agreed, and ready to execute. No follow-up call required to decode them.</p>
                        </div>
                    </li>
                </ol>
            </div>
        </section>

        <section class="lw-wwm-mentor">
            <div class="lw-container lw-wwm-mentor__grid">
                <figure>
                    <img src="{{ asset('images/about/about-portrait.jpg') }}" alt="Shruti Bhatt, founder of LinkingWordz">
                </figure>
                <div>
                    <p class="lw-eyebrow">About your mentor</p>
                    <h2>Why Shruti?</h2>
                    <p>Before Linkingwordz, Shruti was an M.Phil student, then a college lecturer in Accounting, Finance, and Management. She moved into freelance writing and linguistics — and spent 9+ years building a practice from scratch.</p>
                    <p>She knows what it feels like to not know where to start. She also knows what it takes to build something that actually works — clients who stay, referrals that come in, and a niche that feels like yours.</p>
                    <p>This session isn't about theory. It's about the specific decisions Shruti wishes someone had helped her make faster.</p>
                    <blockquote>“9+ years. A deliberate niche. A client list built entirely on referrals and search. The 45 minutes I'm offering you is the conversation I needed when I started.”</blockquote>
                </div>
            </div>
        </section>

        <section class="lw-wwm-details">
            <div class="lw-container">
                <p class="lw-eyebrow">Session details</p>
                <h2>Everything included in your 45 minutes</h2>
                <ul class="lw-wwm-details__list">
                    <li>Pre-session intake form so we make full use of every minute</li>
                    <li>45-minute 1:1 video session with Shruti via Topmate</li>
                    <li>Full situation assessment — where you are, what's working, what's blocking you</li>
                    <li>Skills and niche mapping specific to your background</li>
                    <li>A clear 30-day action plan built during the session</li>
                    <li>Honest, direct feedback — not generic encouragement</li>
                    <li>Session notes shared after the call</li>
                </ul>
                <div class="lw-wwm-hero__actions">
                    <a class="lw-btn lw-btn--primary" href="https://topmate.io/shrutibhatt/1835899" target="_blank" rel="noreferrer">Book on Topmate</a>
                    <a class="lw-wwm-mail" href="mailto:connect@linkingwordz.com">or write directly: connect@linkingwordz.com</a>
                </div>
            </div>
        </section>

        <section class="lw-wwm-cta">
            <div class="lw-container">
                <h2>You don't need more advice. You need a plan.</h2>
                <p>I'm Shruti — and I spent years figuring out freelancing the hard way. This session exists so you don't have to.</p>
                <p>45 minutes. A clear output. No obligation to book anything else — not even after the call. Just show up. We'll figure it out together.</p>
                <a class="lw-btn lw-btn--primary" href="https://topmate.io/shrutibhatt/1835899" target="_blank" rel="noreferrer">Book on Topmate</a>
                <a class="lw-wwm-mail" href="mailto:connect@linkingwordz.com">or write directly: connect@linkingwordz.com</a>
            </div>
        </section>
    </div>
@endsection
