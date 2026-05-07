@extends('layouts.app', ['title' => 'Admin Booking Details'])

@push('styles')
    <link rel="stylesheet" href="/assets/css/booking-details.css">
@endpush

@section('content')
<div class="bd-page">
    <div class="bd-container">
    @if (session('success'))
        <div class="bd-error bd-success" style="margin-bottom:16px;">
            {{ session('success') }}
        </div>
    @endif
    <div class="bd-header">
        <h1 class="bd-title">Booking Review</h1>
        <a href="{{ route('admin.bookings.index') }}" class="bd-link">Back to bookings</a>
    </div>

    <div class="bd-card bd-stack">
        <div class="bd-row"><span class="bd-label">Status:</span> <span>{{ str_replace('_', ' ', $booking->status) }}</span></div>
        <div class="bd-row"><span class="bd-label">Event date:</span> <span>{{ $booking->event_date->toFormattedDateString() }}</span></div>
        <div class="bd-row"><span class="bd-label">Client:</span> <span>{{ $booking->contact_name }} · {{ $booking->contact_email }} · {{ $booking->contact_phone }}</span></div>
        <div class="bd-row"><span class="bd-label">Details:</span> <span>{{ $booking->event_details ?: 'None' }}</span></div>

        <div>
            <h2 class="bd-section-title">Services</h2>
            <ul class="bd-list">
                @foreach ($booking->services as $service)
                    <li>{{ $service->name }} x {{ $service->pivot->quantity }} ({{ (int) $service->pivot->unit_price === 0 ? 'Custom quote' : '₱' . number_format($service->pivot->unit_price) }})</li>
                @endforeach
            </ul>
        </div>

        <div class="bd-total">
            Subtotal: {{ $booking->subtotal() > 0 ? '₱' . number_format($booking->subtotal()) : 'Custom quote' }}
        </div>

        @if ($booking->admin_notes)
            <div class="bd-row">
                <span class="bd-label">Admin notes:</span>
                <div class="bd-admin-note">{{ $booking->admin_notes }}</div>
            </div>
        @endif

        @if ($booking->paymentProof)
            <div class="bd-row"><span class="bd-label">Payment proof:</span> <span>{{ $booking->paymentProof->file_path }}</span></div>
        @endif
    </div>

    <form method="POST" action="{{ route('admin.bookings.update-status', $booking) }}" class="bd-form bd-card bd-stack">
        @csrf
        @method('PATCH')
        <h2 class="bd-section-title">Update status</h2>
        <div class="bd-field">
        <select name="status" class="bd-select">
            @foreach (['pending','approved','awaiting_payment','confirmed','cancelled'] as $status)
                <option value="{{ $status }}" @selected($booking->status === $status)>{{ $status }}</option>
            @endforeach
        </select>
        </div>
        <div class="bd-field">
        <textarea name="admin_notes" rows="4" class="bd-textarea" placeholder="Admin notes">{{ $booking->admin_notes }}</textarea>
        </div>
        <button type="submit" class="bd-button">Save</button>
    </form>
    </div>
</div>
@endsection