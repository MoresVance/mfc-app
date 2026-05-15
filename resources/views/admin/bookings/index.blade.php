@extends('layouts.app', ['title' => 'Admin Bookings'])

@push('styles')
    <link rel="stylesheet" href="/assets/css/admin-bookings.css">
@endpush

@section('content')
<div class="ab-page">
    <div class="ab-container">
    <div class="ab-header">
        <h1 class="ab-title">Bookings</h1>
    </div>

    <form class="ab-card ab-filter-card" method="GET">
        <div class="ab-filter-form">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or email" class="ab-input">
        <select name="status" class="ab-select">
            <option value="">All statuses</option>
            @foreach (['pending','approved','awaiting_payment','confirmed','cancelled','rejected'] as $status)
                <option value="{{ $status }}" @selected(request('status') === $status)>{{ $status }}</option>
            @endforeach
        </select>
        <button class="ab-button">Filter</button>
        </div>
    </form>

    <div class="ab-list">
        @foreach ($bookings as $booking)
            <a href="{{ route('admin.bookings.show', $booking) }}" class="ab-card ab-item">
                <div class="ab-item-head">
                    <div>
                        <div class="ab-name">{{ $booking->contact_name }}</div>
                        <div class="ab-meta">{{ $booking->contact_email }} · {{ $booking->event_date->toFormattedDateString() }}</div>
                    </div>
                    <div class="ab-status ab-status--{{ $booking->status }}">{{ str_replace('_', ' ', $booking->status) }}</div>
                </div>
            </a>
        @endforeach
    </div>

</div>
</div>
@endsection