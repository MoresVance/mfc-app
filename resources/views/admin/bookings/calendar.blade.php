@extends('layouts.app', ['title' => 'Admin Booking Calendar'])

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold">Booking Calendar</h1>
        <a href="{{ route('admin.bookings.index') }}" class="text-sm underline">Back to bookings</a>
    </div>

    <div class="space-y-4">
        @forelse ($bookingsByDate as $date => $bookings)
            <div class="rounded-lg border border-gray-200 p-4">
                <div class="font-semibold mb-2">{{ \Illuminate\Support\Carbon::parse($date)->toFormattedDateString() }}</div>
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($bookings as $booking)
                        <li>{{ $booking->contact_name }} · {{ $booking->status }}</li>
                    @endforeach
                </ul>
            </div>
        @empty
            <p class="text-gray-600">No bookings for this month.</p>
        @endforelse
    </div>
</div>
@endsection