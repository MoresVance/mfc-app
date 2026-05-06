@extends('layouts.app', ['title' => 'Admin Bookings'])

@section('content')
<div class="container mx-auto px-4 py-8 max-w-6xl">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold">Bookings</h1>
        <a href="{{ route('admin.bookings.calendar') }}" class="text-sm underline">Calendar view</a>
    </div>

    <form class="mb-6 flex flex-col gap-3 md:flex-row" method="GET">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or email" class="rounded-md border border-gray-300 px-3 py-2 md:flex-1">
        <select name="status" class="rounded-md border border-gray-300 px-3 py-2">
            <option value="">All statuses</option>
            @foreach (['pending','approved','awaiting_payment','confirmed','cancelled'] as $status)
                <option value="{{ $status }}" @selected(request('status') === $status)>{{ $status }}</option>
            @endforeach
        </select>
        <button class="rounded-md bg-black px-5 py-2 text-white">Filter</button>
    </form>

    <div class="space-y-4">
        @foreach ($bookings as $booking)
            <a href="{{ route('admin.bookings.show', $booking) }}" class="block rounded-lg border border-gray-200 p-4 hover:border-black">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <div class="font-medium">{{ $booking->contact_name }}</div>
                        <div class="text-sm text-gray-600">{{ $booking->contact_email }} · {{ $booking->event_date->toFormattedDateString() }}</div>
                    </div>
                    <div class="text-sm">{{ $booking->status }}</div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $bookings->links() }}
    </div>
</div>
@endsection