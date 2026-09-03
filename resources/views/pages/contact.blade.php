@extends('layouts.app')

@section('title', 'Contact Us — LinkingWordz')

@section('content')
    @php
        $hero = $sections['hero'] ?? [];
        $formHeader = $sections['form'] ?? [];
        $booking = $sections['booking'] ?? [];
    @endphp
    <div class="lw-page lw-ct">
        <header class="lw-ct-hero">
            @include('partials.ornament')
            <div class="lw-container lw-ct-hero__grid">
                <div>
                    <p class="lw-eyebrow">{{ $hero['eyebrow'] ?? '' }}</p>
                    <h1>{{ $hero['title'] ?? '' }}</h1>
                    <p>{{ $hero['text_1'] ?? '' }}</p>
                    <p>Feel free to contact us using the form. Alternatively, you can email me at <a href="mailto:{{ $hero['email'] ?? 'connect@linkingwordz.com' }}">{{ $hero['email'] ?? 'connect@linkingwordz.com' }}</a></p>
                </div>
                <figure class="lw-ct-hero__photo">
                    <img src="{{ asset($hero['image'] ?? 'images/contact/shruti-contact.jpg') }}" alt="Shruti Bhatt">
                </figure>
            </div>
        </header>

        <section class="lw-ct-main lw-has-rings">
            <div class="lw-container lw-ct-main__grid">
                <form class="lw-ct-form" method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <p class="lw-eyebrow">{{ $formHeader['eyebrow'] ?? '' }}</p>
                    <h2>{{ $formHeader['title'] ?? '' }}</h2>
                    @if (session('contact_success'))
                        <div class="lw-contact-form__success">{{ session('contact_success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="lw-ct-form__error">Please check the highlighted fields and try again.</div>
                    @endif
                    <div class="lw-ct-form__row">
                        <div>
                            <label for="first_name">First name *</label>
                            <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" required>
                        </div>
                        <div>
                            <label for="last_name">Last name</label>
                            <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}">
                        </div>
                    </div>
                    <div class="lw-ct-form__row">
                        <div>
                            <label for="email">Email *</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required>
                        </div>
                        <div>
                            <label for="phone">Phone</label>
                            <input id="phone" name="phone" type="tel" value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div>
                        <label for="message">Write a message</label>
                        <textarea id="message" name="message" rows="6">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="lw-btn lw-btn--primary">Submit <span class="lw-btn__arrow" aria-hidden="true">→</span></button>
                </form>

                <div class="lw-ct-book" id="book">
                    <p class="lw-eyebrow">{{ $booking['eyebrow'] ?? '' }}</p>
                    <h2>{{ $booking['title'] ?? '' }}</h2>
                    <p class="lw-ct-book__lede">{{ $booking['lede'] ?? '' }}</p>
                    <div class="lw-ct-cal">
                        <div class="lw-ct-cal__head">
                            <button type="button" id="cal-prev" aria-label="Previous week">‹</button>
                            <strong id="cal-label">This week</strong>
                            <button type="button" id="cal-next" aria-label="Next week">›</button>
                        </div>
                        <div class="lw-ct-cal__days" id="cal-days"></div>
                        <div class="lw-ct-cal__slots" id="cal-slots" hidden>
                            <p>Available times <span>(IST)</span></p>
                            <div id="cal-slot-list"></div>
                        </div>
                        <a class="lw-btn lw-btn--primary" id="cal-confirm" href="{{ $booking['calendly_url'] ?? 'https://calendly.com/linkingwordz/30min' }}" target="_blank" rel="noreferrer">Confirm on Calendly</a>
                        <p class="lw-ct-book__note" id="cal-note">{{ $booking['note'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script>
(function () {
  const daysEl = document.getElementById('cal-days');
  const slotsWrap = document.getElementById('cal-slots');
  const slotList = document.getElementById('cal-slot-list');
  const label = document.getElementById('cal-label');
  const confirm = document.getElementById('cal-confirm');
  const note = document.getElementById('cal-note');
  if (!daysEl) return;

  const slots = ['10:00', '11:00', '14:00', '16:00', '18:00'];
  let weekOffset = 0;
  let selectedDate = null;
  let selectedTime = null;

  function startOfWeek(d) {
    const x = new Date(d);
    const day = x.getDay();
    const diff = day === 0 ? -6 : 1 - day;
    x.setDate(x.getDate() + diff);
    x.setHours(0, 0, 0, 0);
    return x;
  }

  function fmt(d) {
    return d.toLocaleDateString('en-IN', { day: 'numeric', month: 'short' });
  }

  function render() {
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    const start = startOfWeek(today);
    start.setDate(start.getDate() + weekOffset * 7);
    const end = new Date(start);
    end.setDate(end.getDate() + 6);
    label.textContent = fmt(start) + ' – ' + fmt(end);
    daysEl.innerHTML = '';
    for (let i = 0; i < 7; i++) {
      const d = new Date(start);
      d.setDate(start.getDate() + i);
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'lw-ct-day';
      if (d < today) btn.disabled = true;
      if (selectedDate && d.toDateString() === selectedDate.toDateString()) btn.classList.add('is-on');
      btn.innerHTML = '<small>' + d.toLocaleDateString('en-IN', { weekday: 'short' }) + '</small><b>' + d.getDate() + '</b>';
      btn.addEventListener('click', function () {
        selectedDate = d;
        selectedTime = null;
        render();
        renderSlots();
      });
      daysEl.appendChild(btn);
    }
    document.getElementById('cal-prev').disabled = weekOffset <= 0;
  }

  function renderSlots() {
    slotsWrap.hidden = !selectedDate;
    slotList.innerHTML = '';
    slots.forEach(function (t) {
      const b = document.createElement('button');
      b.type = 'button';
      b.className = 'lw-ct-slot' + (selectedTime === t ? ' is-on' : '');
      b.textContent = t;
      b.addEventListener('click', function () {
        selectedTime = t;
        const dateStr = selectedDate.toLocaleDateString('en-IN', { weekday: 'long', day: 'numeric', month: 'long' });
        note.textContent = 'Selected: ' + dateStr + ' at ' + t + ' IST. Confirm to finish booking on Calendly.';
        confirm.href = '{{ $booking['calendly_url'] ?? 'https://calendly.com/linkingwordz/30min' }}';
        renderSlots();
      });
      slotList.appendChild(b);
    });
  }

  document.getElementById('cal-prev').addEventListener('click', function () {
    weekOffset = Math.max(0, weekOffset - 1);
    render();
  });
  document.getElementById('cal-next').addEventListener('click', function () {
    weekOffset += 1;
    render();
  });
  render();
})();
</script>
@endpush
