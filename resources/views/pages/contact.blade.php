@extends('layouts.app')

@section('title', 'Contact — LinkingWordz')

@section('content')
    <div class="lw-page lw-contact-page">
        <section class="lw-page-hero" aria-labelledby="contact-page-title">
            <div class="lw-container lw-page-hero__inner">
                <p class="lw-eyebrow">Let's connect</p>
                <h1 id="contact-page-title">A good first conversation can change the shape of the work.</h1>
                <p class="lw-page-hero__lede">Tell us what you're building, what feels stuck, or what you want your content
                    to do next.</p>
            </div>
        </section>
        <section class="lw-contact-section lw-section">
            <div class="lw-container lw-contact-section__grid">
                <div class="lw-contact-details">
                    <p class="lw-eyebrow">Direct contact</p>
                    <h2>No obligation. No pressure.</h2>
                    <p>Just a conversation about your authors, publishing goals, business, or brand.</p>
                    <div class="lw-contact-details__items"><a
                            href="mailto:connect@linkingwordz.com"><span>Email</span><strong>connect@linkingwordz.com</strong></a><a
                            href="https://wa.me/919901230875" target="_blank"
                            rel="noreferrer"><span>WhatsApp</span><strong>+91 9901230875</strong></a><a
                            href="https://calendly.com/linkingwordz/30min" target="_blank" rel="noreferrer"><span>Book a
                                call</span><strong>calendly.com/linkingwordz/30min</strong></a></div>
                </div>
                <form class="lw-contact-form" method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    @if (session('contact_success'))
                        <div class="lw-contact-form__success">{{ session('contact_success') }}</div>
                    @endif
                    <div><label for="name">Your name</label><input id="name" name="name" type="text"
                            value="{{ old('name') }}" required></div>
                    <div><label for="email">Email address</label><input id="email" name="email" type="email"
                            value="{{ old('email') }}" required></div>
                    <div><label for="message">Tell us a little about what you need</label>
                        <textarea id="message" name="message" rows="6" required>{{ old('message') }}</textarea>
                    </div><button type="submit" class="lw-btn lw-btn--primary">Send enquiry <span class="lw-btn__arrow"
                            aria-hidden="true">→</span></button>
                </form>
            </div>
        </section>
    </div>
@endsection
