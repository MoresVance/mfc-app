@extends('layouts.app', ['title' => 'Admin Booking Calendar'])

@push('styles')
    <link rel="stylesheet" href="/assets/css/admin-bookings.css">
@endpush

@section('content')
<div class="ab-page">
    <div class="ab-container">
    <div class="ab-header">
        <h1 class="ab-title">Booking Calendar</h1>
        <a href="{{ route('admin.bookings.index') }}" class="ab-link">Back to bookings</a>
    </div>

    <div class="ab-group">
        @forelse ($bookingsByDate as $date => $bookings)
            <div class="ab-card ab-calendar-card">
                <div class="ab-date">{{ \Illuminate\Support\Carbon::parse($date)->toFormattedDateString() }}</div>
                <ul class="ab-list-bullets">
                    @foreach ($bookings as $booking)
                        <li>{{ $booking->contact_name }} · {{ $booking->status }}</li>
                    @endforeach
                </ul>
            </div>
        @empty
            <p class="ab-meta">No bookings for this month.</p>
        @endforelse
    </div>
</div>
</div>
@endsection