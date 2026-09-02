@extends('admin.layout')

@section('title', 'Site settings')
@section('kicker', 'Content')
@section('heading', 'Site settings')

@section('content')
    <form class="ad-form" method="post" action="{{ route('admin.settings.update') }}">
        @csrf
        @method('PUT')

        <div class="ad-form__grid">
            <div class="ad-form__main">
                <p class="ad-kicker">Contact &amp; social</p>
                <label>Primary email
                    <input type="email" name="email" value="{{ old('email', $contact['email']) }}" required>
                </label>
                <label>Contact form email
                    <input type="email" name="connect_email" value="{{ old('connect_email', $contact['connect_email']) }}" required>
                </label>
                <label>Phone
                    <input type="text" name="phone" value="{{ old('phone', $contact['phone']) }}">
                </label>
                <label>WhatsApp number <small>Digits only, e.g. 919901230875</small>
                    <input type="text" name="whatsapp" value="{{ old('whatsapp', $contact['whatsapp']) }}">
                </label>
                <label>Address
                    <input type="text" name="address" value="{{ old('address', $contact['address']) }}">
                </label>
                <label>Instagram URL
                    <input type="url" name="instagram" value="{{ old('instagram', $contact['instagram']) }}">
                </label>
                <label>Facebook URL
                    <input type="url" name="facebook" value="{{ old('facebook', $contact['facebook']) }}">
                </label>
                <label>LinkedIn URL
                    <input type="url" name="linkedin" value="{{ old('linkedin', $contact['linkedin']) }}">
                </label>

                <p class="ad-kicker" style="margin-top:1.5rem">Home page sections</p>
                <p class="ad-login__lead">Edit JSON carefully. Invalid JSON will be rejected on save.</p>

                @foreach ($homeSections as $key => $json)
                    <label>{{ str_replace('_', ' ', ucfirst($key)) }}
                        <textarea name="{{ $key }}" rows="8">{{ old($key, $json) }}</textarea>
                    </label>
                    @error($key)<p class="ad-error">{{ $message }}</p>@enderror
                @endforeach
            </div>
            <aside class="ad-form__side">
                <button type="submit" class="ad-btn">Save settings</button>
                <a class="ad-link" href="{{ route('admin.dashboard') }}">Back to overview</a>
            </aside>
        </div>
    </form>
@endsection
