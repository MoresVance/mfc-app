@extends('layouts.app', ['title' => 'My Bookings'])

@push('styles')
    <link rel="stylesheet" href="/assets/css/booking.css">
@endpush

@section('content')
<div class="bk-page">
    <div class="bk-container">
        <div class="bk-hero">
            <div>
                <p class="bk-kicker">Booking Dashboard</p>
                <h1 class="bk-title">Hello, {{ auth()->user()->name }}</h1>
                <p class="bk-subtitle">Track requests, see statuses, and start a new booking whenever you’re ready.</p>
            </div>
            <a href="{{ route('bookings.create') }}" class="bk-primary-btn">Start booking</a>
        </div>

        @if ($bookings->count() === 0)
            <div class="bk-empty-state">
                <div class="bk-empty-icon">🎈</div>
                <h2>No bookings yet</h2>
                <p>Start booking to send your first request to MFC.</p>
                <a href="{{ route('bookings.create') }}" class="bk-primary-btn">Start booking</a>
            </div>
        @else
            <div class="bk-grid">
                @foreach ($bookings as $booking)
                    <a href="{{ route('bookings.show', $booking) }}" class="bk-card">
                        <div class="bk-card-top">
                            <div>
                                <h3>{{ $booking->contact_name }}</h3>
                                <p>{{ $booking->event_date->format('M j, Y') }}</p>
                            </div>
                            <span class="bk-status bk-status--{{ $booking->status }}">{{ str_replace('_', ' ', $booking->status) }}</span>
                        </div>
                        <div class="bk-card-body">
                            <span>{{ $booking->services->count() }} service{{ $booking->services->count() === 1 ? '' : 's' }}</span>
                            <strong>₱{{ number_format($booking->subtotal()) }}</strong>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="bk-pagination">
                {{ $bookings->links() }}
            </div>
        @endif
    </div>
</div>
@endsection