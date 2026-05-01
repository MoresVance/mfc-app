@extends('layouts.app', ['title' => 'Admin Booking Calendar'])

@push('styles')
    <link rel="stylesheet" href="/assets/css/availability-calendar.css">
@endpush

@section('content')
@php
    $calendarCells = [
        ['type' => 'empty'],
        ['type' => 'empty'],
        ['type' => 'booked', 'day' => 1],
        ['type' => 'booked', 'day' => 2],
        ['type' => 'available', 'day' => 3],
        ['type' => 'available', 'day' => 4],
        ['type' => 'available', 'day' => 5],
        ['type' => 'booked', 'day' => 6],
        ['type' => 'booked', 'day' => 7],
        ['type' => 'available', 'day' => 8],
        ['type' => 'available', 'day' => 9],
        ['type' => 'booked', 'day' => 10],
        ['type' => 'available', 'day' => 11],
        ['type' => 'available', 'day' => 12],
        ['type' => 'booked', 'day' => 13],
        ['type' => 'booked', 'day' => 14],
        ['type' => 'available', 'day' => 15],
        ['type' => 'available', 'day' => 16],
        ['type' => 'available', 'day' => 17],
        ['type' => 'available', 'day' => 18],
        ['type' => 'booked', 'day' => 19],
        ['type' => 'booked', 'day' => 20],
        ['type' => 'booked', 'day' => 21],
        ['type' => 'available', 'day' => 22],
        ['type' => 'available', 'day' => 23],
        ['type' => 'available', 'day' => 24],
        ['type' => 'available', 'day' => 25],
        ['type' => 'available', 'day' => 26],
        ['type' => 'booked', 'day' => 27],
        ['type' => 'booked', 'day' => 28],
        ['type' => 'available', 'day' => 29],
        ['type' => 'available', 'day' => 30],
        ['type' => 'empty'],
        ['type' => 'empty'],
        ['type' => 'empty'],
    ];
@endphp

<div class="admin-container">
    <div class="content-wrapper">
        <header class="calendar-header">
            <h1>Booking Calendar</h1>
        </header>

        <div class="main-layout">
            <div class="calendar-card">
                <div class="month-navigation">
                    <button class="nav-btn"><i data-lucide="chevron-left"></i></button>
                    <h2>April 2026</h2>
                    <button class="nav-btn"><i data-lucide="chevron-right"></i></button>
                </div>

                <div class="calendar-grid day-headers">
                    <div>SUN</div><div>MON</div><div>TUE</div><div>WED</div><div>THU</div><div>FRI</div><div>SAT</div>
                </div>

                <div class="calendar-grid calendar-days">
                    @foreach ($calendarCells as $cell)
                        @if ($cell['type'] === 'empty')
                            <div class="day-cell empty"></div>
                        @elseif ($cell['type'] === 'available')
                            <div class="day-cell available">
                                <span class="day-number">{{ $cell['day'] }}</span>
                                <a href="{{ route('booking') }}" class="day-action day-action--available">Book Now</a>
                            </div>
                        @else
                            <div class="day-cell booked">
                                <span class="day-number">{{ $cell['day'] }}</span>
                                <button type="button" class="day-action day-action--booked" disabled>Fully Booked</button>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="legend">
                    <div class="legend-item">
                        <div class="dot available"></div>
                        <span>Available</span>
                    </div>
                    <div class="legend-item">
                        <div class="dot booked"></div>
                        <span>Fully Booked</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection