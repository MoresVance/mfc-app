@extends('layouts.app', ['title' => 'Booking Calendar'])

@push('styles')
    <link rel="stylesheet" href="/assets/css/availability-calendar.css">
@endpush

@section('content')
<div class="admin-container">
    <div class="content-wrapper">
        @if (session('success'))
            <div class="calendar-alert">{{ session('success') }}</div>
        @endif

        <header class="calendar-header">
            <h1>Booking Calendar</h1>
            @if ($isAdmin)
                <label class="admin-controls-toggle" for="adminControlsToggle">
                    <span class="admin-controls-toggle__label">Admin controls</span>
                    <span class="admin-controls-switch">
                        <input type="checkbox" id="adminControlsToggle" checked>
                        <span class="admin-controls-switch__track">
                            <span class="admin-controls-switch__thumb"></span>
                        </span>
                    </span>
                </label>
            @endif
        </header>

        <div class="main-layout">
            <div class="calendar-card" data-controls="on">
                <div class="month-navigation">
                    <a href="{{ route('availability', ['month' => $previousMonth]) }}" class="nav-btn" aria-label="Previous month">&#8592;</a>
                    <h2>{{ $monthLabel }}</h2>
                    <a href="{{ route('availability', ['month' => $nextMonth]) }}" class="nav-btn" aria-label="Next month">&#8594;</a>
                </div>

                <div class="calendar-grid day-headers">
                    <div>SUN</div><div>MON</div><div>TUE</div><div>WED</div><div>THU</div><div>FRI</div><div>SAT</div>
                </div>

                <div class="calendar-grid calendar-days">
                    @foreach ($days as $cell)
                        @php
                            $cellClasses = ['day-cell'];
                            if (! $cell['isCurrentMonth']) {
                                $cellClasses[] = 'empty';
                            }
                            if ($cell['isBooked']) {
                                $cellClasses[] = 'booked';
                            } else {
                                $cellClasses[] = 'available';
                            }
                            if ($cell['isToday']) {
                                $cellClasses[] = 'today';
                            }
                            if ($cell['isPast']) {
                                $cellClasses[] = 'past';
                            }
                        @endphp
                        <div class="{{ implode(' ', $cellClasses) }}">
                            <span class="day-number">{{ $cell['day'] }}</span>

                            @if ($cell['canBook'] && $cell['isCurrentMonth'])
                                <a href="{{ route('bookings.create', ['event_date' => $cell['date']]) }}" class="day-action day-action--book day-action--available">Book Now</a>
                            @elseif ($cell['isBooked'])
                                <button type="button" class="day-action day-action--book day-action--booked" disabled>Fully Booked</button>
                            @else
                                <button type="button" class="day-action day-action--book day-action--past" disabled>Unavailable</button>
                            @endif

                            @if ($isAdmin && ! $cell['isPast'] && $cell['isCurrentMonth'])
                                <form method="POST" action="{{ route('admin.availability.set-date-status', ['date' => $cell['date']]) }}" class="day-action day-action--admin" data-admin-status="{{ $cell['isBooked'] ? 'available' : 'booked' }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="month" value="{{ $currentMonth }}">
                                    <input type="hidden" name="status" value="{{ $cell['isBooked'] ? 'available' : 'booked' }}">
                                    <button type="submit" class="day-admin-action">
                                        {{ $cell['isBooked'] ? 'Set Available' : 'Set Fully Booked' }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="legend">
                    <div class="legend-item">
                        <div class="dot today"></div>
                        <span>Today</span>
                    </div>
                    <div class="legend-item">
                        <div class="dot available"></div>
                        <span>Available</span>
                    </div>
                    <div class="legend-item">
                        <div class="dot booked"></div>
                        <span>Fully Booked</span>
                    </div>
                    <div class="legend-item">
                        <div class="dot unavailable"></div>
                        <span>Past / Unavailable</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
(() => {
    const toggle = document.getElementById('adminControlsToggle');
    const calendarCard = document.querySelector('.calendar-card');
    if (!toggle || !calendarCard) return;

    const storageKey = 'availabilityAdminControls';
    const savedMode = localStorage.getItem(storageKey);
    const initialMode = savedMode === null ? 'on' : savedMode;

    toggle.checked = initialMode === 'on';
    calendarCard.dataset.controls = toggle.checked ? 'on' : 'off';

    toggle.addEventListener('change', () => {
        const mode = toggle.checked ? 'on' : 'off';
        calendarCard.dataset.controls = mode;
        localStorage.setItem(storageKey, mode);
    });
})();
</script>
@endpush
@endsection