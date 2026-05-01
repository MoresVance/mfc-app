{{-- resources/views/booking/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Create Booking Request')

@push('styles')
  <link rel="stylesheet" href="/assets/css/booking.css">
@endpush

@section('content')
<div class="bf-page">
  <div class="bf-container">

    <div class="bf-header">
      <h1 class="bf-title">Create Booking Request</h1>
      <a href="{{ route('home') }}" class="back-btn" aria-label="Go back to home">
        <span aria-hidden="true">&#8592;</span>
      </a>
    </div>

    <form id="bookingForm" action="{{ route('bookings.store') }}" method="POST">
      @csrf

      <div class="bf-grid">

        {{-- ───────────── LEFT COLUMN ───────────── --}}
        <div class="bf-col-left">

          {{-- Event Date --}}
          <div class="bf-card">
            <label class="bf-label" for="event_date">
              Event Date <span class="bf-required">*</span>
            </label>
            <div class="bf-date-wrap">
              <svg class="bf-date-icon" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                <rect x="3" y="4" width="18" height="18" rx="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8"  y1="2" x2="8"  y2="6"/>
                <line x1="3"  y1="10" x2="21" y2="10"/>
              </svg>
              <input
                type="date"
                id="event_date"
                name="event_date"
                class="bf-date-input{{ $errors->has('event_date') ? ' bf-input-err' : '' }}"
                min="{{ $today }}"
                value="{{ old('event_date') }}"
                required
              >
            </div>
            @error('event_date')
              <p class="bf-err-msg">{{ $message }}</p>
            @enderror
            <p class="bf-hint">Select a date for your event (past dates are blocked)</p>
          </div>

          {{-- Select Services --}}
          <div class="bf-card">
            <div class="bf-card-head">
              <h2 class="bf-card-title">Select Services</h2>
              <div class="bf-category-tabs" role="tablist" aria-label="Service categories">
                <button type="button" class="bf-category-tab is-active" data-category-filter="all">All</button>
                <button type="button" class="bf-category-tab" data-category-filter="packages">Packages</button>
                <button type="button" class="bf-category-tab" data-category-filter="decor">Decor</button>
                <button type="button" class="bf-category-tab" data-category-filter="entertainment">Entertainment</button>
                <button type="button" class="bf-category-tab" data-category-filter="foodcarts">Food carts</button>
              </div>
            </div>
            <div id="serviceList">
              @foreach ($services as $svc)
              <div class="bf-service-row" id="row_{{ $svc['id'] }}"
                   data-id="{{ $svc['id'] }}"
                   data-category="{{ $svc['category'] ?? 'all' }}"
                   data-price="{{ $svc['price'] }}"
                   data-price-label="{{ $svc['priceLabel'] ?? number_format($svc['price']) }}">

                <input type="checkbox"
                       class="bf-chk-native"
                       id="chk_{{ $svc['id'] }}"
                       name="services[{{ $svc['id'] }}][selected]"
                       value="1"
                       onchange="toggleService({{ $svc['id'] }})">
                <label class="bf-chk-box" for="chk_{{ $svc['id'] }}">
                  <svg class="bf-chk-icon" viewBox="0 0 10 8" fill="none"
                       stroke="white" stroke-width="2.2" stroke-linecap="round">
                    <polyline points="1 4 4 7 9 1"/>
                  </svg>
                </label>

                <span class="bf-svc-emoji">{{ $svc['emoji'] }}</span>

                <div class="bf-svc-info">
                  <span class="bf-svc-name">{{ $svc['name'] }}</span>
                  <span class="bf-svc-price">{{ $svc['priceLabel'] ?? ('₱' . number_format($svc['price'])) }}</span>
                </div>

                <div class="bf-stepper" id="stepper_{{ $svc['id'] }}">
                  <button type="button" class="bf-step-minus"
                          onclick="changeQty({{ $svc['id'] }}, -1)">−</button>
                  <span class="bf-step-val" id="qty_{{ $svc['id'] }}">0</span>
                  <button type="button" class="bf-step-plus"
                          onclick="changeQty({{ $svc['id'] }}, 1)">+</button>
                  <input type="hidden"
                         name="services[{{ $svc['id'] }}][quantity]"
                         id="qtyInput_{{ $svc['id'] }}"
                         value="0">
                </div>
              </div>
              @endforeach
            </div>
          </div>

          {{-- Event Details --}}
          <div class="bf-card">
            <label class="bf-label" for="event_details">Event Details</label>
            <textarea
              id="event_details"
              name="event_details"
              class="bf-textarea{{ $errors->has('event_details') ? ' bf-input-err' : '' }}"
              rows="5"
              placeholder="Tell us about your event (type, expected guests, venue, special requirements, etc.)"
            >{{ old('event_details') }}</textarea>
            @error('event_details')
              <p class="bf-err-msg">{{ $message }}</p>
            @enderror
          </div>

          {{-- Contact Information --}}
          <div class="bf-card">
            <h2 class="bf-card-title">Contact Information</h2>
            <div class="bf-fields">

              <div class="bf-field-group">
                <label class="bf-label-sm" for="contact_name">
                  Full Name <span class="bf-required">*</span>
                </label>
                <input type="text" id="contact_name" name="contact_name"
                       class="bf-input{{ $errors->has('contact_name') ? ' bf-input-err' : '' }}"
                       placeholder="Juan Dela Cruz"
                       value="{{ old('contact_name') }}" required>
                @error('contact_name')
                  <p class="bf-err-msg">{{ $message }}</p>
                @enderror
              </div>

              <div class="bf-field-group">
                <label class="bf-label-sm" for="contact_email">
                  Email Address <span class="bf-required">*</span>
                </label>
                <input type="email" id="contact_email" name="contact_email"
                       class="bf-input{{ $errors->has('contact_email') ? ' bf-input-err' : '' }}"
                       placeholder="juan@example.com"
                       value="{{ old('contact_email') }}" required>
                @error('contact_email')
                  <p class="bf-err-msg">{{ $message }}</p>
                @enderror
              </div>

              <div class="bf-field-group">
                <label class="bf-label-sm" for="contact_phone">
                  Phone Number <span class="bf-required">*</span>
                </label>
                <input type="tel" id="contact_phone" name="contact_phone"
                       class="bf-input{{ $errors->has('contact_phone') ? ' bf-input-err' : '' }}"
                       placeholder="+63 912 345 6789"
                       value="{{ old('contact_phone') }}" required>
                @error('contact_phone')
                  <p class="bf-err-msg">{{ $message }}</p>
                @enderror
              </div>

            </div>
          </div>

          {{-- Submit --}}
          <div class="bf-submit-wrap">
            <button type="submit" class="bf-submit-btn" id="submitBtn" disabled>
              Submit booking request
            </button>
            <p class="bf-submit-note">
              No payment required yet — your request will be reviewed first.
            </p>
          </div>

        </div>{{-- /col-left --}}

        {{-- ───────────── RIGHT COLUMN ───────────── --}}
        <div class="bf-col-right">
          <div class="bf-summary" id="orderSummary">
            <h2 class="bf-summary-title">Order Summary</h2>
            <p class="bf-summary-empty" id="summaryEmpty">No services selected</p>
            <ul class="bf-summary-list" id="summaryList"></ul>
            <hr class="bf-summary-hr" id="summaryDivider" style="display:none;">
            <div class="bf-summary-total" id="summaryTotal" style="display:none;">
              <span>Subtotal</span>
              <span id="totalAmount">₱0</span>
            </div>
            <p class="bf-summary-footnote" id="summaryFootnote" style="display:none;">
              Final price may vary. Admin will confirm upon review.
            </p>
          </div>
        </div>

      </div>{{-- /bf-grid --}}
    </form>

  </div>
</div>

{{-- Success Modal --}}
@if (session('booking_success'))
<div class="bf-modal-backdrop" id="successModal">
  <div class="bf-modal">
    <div class="bf-modal-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="#2E7D4F"
           stroke-width="2.5" stroke-linecap="round"><polyline points="4 12 9 17 20 7"/></svg>
    </div>
    <h2 class="bf-modal-title">Booking submitted!</h2>
    <p class="bf-modal-sub">Awaiting admin confirmation. We'll notify you once reviewed.</p>
    <a href="{{ route('bookings.index') }}" class="bf-btn-green">View my bookings</a>
    <a href="{{ route('home') }}" class="bf-btn-link-red">Back to home</a>
  </div>
</div>
@endif

@push('scripts')
<script>
const services = @json($services);
const selected  = {};
const categoryButtons = Array.from(document.querySelectorAll('[data-category-filter]'));
const serviceRows = Array.from(document.querySelectorAll('.bf-service-row'));
let activeCategory = 'all';

function setActiveCategory(category) {
  activeCategory = category;
  categoryButtons.forEach(button => {
    button.classList.toggle('is-active', button.dataset.categoryFilter === category);
  });

  serviceRows.forEach(row => {
    const rowCategory = row.dataset.category || 'all';
    const shouldShow = category === 'all' || rowCategory === category || (category === 'decor' && rowCategory === 'packages');
    row.classList.toggle('is-hidden', !shouldShow);
  });
}

categoryButtons.forEach(button => {
  button.addEventListener('click', () => setActiveCategory(button.dataset.categoryFilter));
});

function toggleService(id) {
  const chk      = document.getElementById('chk_' + id);
  const qtySpan  = document.getElementById('qty_' + id);
  const qtyInput = document.getElementById('qtyInput_' + id);
  const row      = document.getElementById('row_' + id);

  if (chk.checked) {
    selected[id] = 1;
    qtySpan.textContent = 1;
    qtyInput.value = 1;
    row.classList.add('bf-service-row--active');
  } else {
    delete selected[id];
    qtySpan.textContent = 0;
    qtyInput.value = 0;
    row.classList.remove('bf-service-row--active');
  }
  renderSummary();
  updateSubmit();
}

function changeQty(id, delta) {
  if (!selected[id]) return;
  selected[id] = Math.max(1, selected[id] + delta);
  document.getElementById('qty_' + id).textContent = selected[id];
  document.getElementById('qtyInput_' + id).value  = selected[id];
  renderSummary();
}

function renderSummary() {
  const list      = document.getElementById('summaryList');
  const empty     = document.getElementById('summaryEmpty');
  const divider   = document.getElementById('summaryDivider');
  const totalWrap = document.getElementById('summaryTotal');
  const totalAmt  = document.getElementById('totalAmount');
  const footnote  = document.getElementById('summaryFootnote');
  const ids       = Object.keys(selected);

  if (!ids.length) {
    list.innerHTML = '';
    empty.style.display     = 'block';
    divider.style.display   = 'none';
    totalWrap.style.display = 'none';
    footnote.style.display  = 'none';
    return;
  }

  empty.style.display     = 'none';
  divider.style.display   = '';
  totalWrap.style.display = 'flex';
  footnote.style.display  = 'block';

  let subtotal = 0;
  list.innerHTML = '';
  ids.forEach(id => {
    const svc  = services.find(s => s.id == id);
    if (!svc) return;
    const isCustom = svc.category === 'packages';
    const line = svc.price * selected[id];
    if (!isCustom) {
      subtotal += line;
    }
    const li   = document.createElement('li');
    li.className = 'bf-sum-item';
    li.innerHTML =
      `<span class="bf-sum-name">${svc.emoji} ${svc.name}<em> ×${selected[id]}</em></span>` +
      `<span class="bf-sum-price">${isCustom ? 'Custom quote' : '₱' + line.toLocaleString()}</span>`;
    list.appendChild(li);
  });
  totalAmt.textContent = subtotal ? '₱' + subtotal.toLocaleString() : 'Custom quote';
}

function updateSubmit() {
  document.getElementById('submitBtn').disabled = !Object.keys(selected).length;
}

function syncStepperState() {
  serviceRows.forEach(row => {
    const id = row.dataset.id;
    const chk = document.getElementById('chk_' + id);
    const qtySpan = document.getElementById('qty_' + id);
    const qtyInput = document.getElementById('qtyInput_' + id);

    if (!chk.checked) {
      row.classList.remove('bf-service-row--active');
      qtySpan.textContent = 0;
      qtyInput.value = 0;
    }
  });
}

setActiveCategory('all');
syncStepperState();
renderSummary();
updateSubmit();

const modal = document.getElementById('successModal');
if (modal) modal.addEventListener('click', e => { if (e.target === modal) modal.style.display = 'none'; });
</script>
@endpush
@endsection