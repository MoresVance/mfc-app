@extends('layouts.app', ['title' => 'Booking Details'])

@push('styles')
    <link rel="stylesheet" href="/assets/css/booking-details.css">
@endpush

@section('content')
<div class="bd-page">
    <div class="bd-container">
    <div class="bd-header">
        <h1 class="bd-title">Booking Details</h1>
        <a href="{{ route('bookings.index') }}" class="bd-link">Back to bookings</a>
    </div>

    <div class="bd-card bd-stack">
        <div class="bd-row"><span class="bd-label">Status:</span> <span>{{ $booking->status }}</span></div>
        <div class="bd-row"><span class="bd-label">Event date:</span> <span>{{ $booking->event_date->toFormattedDateString() }}</span></div>
        <div class="bd-row"><span class="bd-label">Contact:</span> <span>{{ $booking->contact_name }} · {{ $booking->contact_email }} · {{ $booking->contact_phone }}</span></div>
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

        @if ($booking->paymentProof)
            <div class="bd-row">
                <span class="bd-label">Payment proof:</span>
                <span>{{ $booking->paymentProof->file_path }}</span>
            </div>
        @endif
    </div>

    <form method="POST" action="{{ route('bookings.upload-payment', $booking) }}" enctype="multipart/form-data" class="bd-form bd-card bd-stack">
        @csrf
        <h2 class="bd-section-title">Upload payment proof</h2>
        <div class="bd-field">
            <input type="file" name="payment_file" class="bd-file">
            @error('payment_file')<span class="bd-error">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="bd-button">Upload</button>
    </form>
    </div>
</div>
@endsection