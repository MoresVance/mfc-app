@extends('layouts.app', ['title' => 'Admin Booking Details'])

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold">Booking Review</h1>
        <a href="{{ route('admin.bookings.index') }}" class="text-sm underline">Back to bookings</a>
    </div>

    <div class="rounded-lg border border-gray-200 p-6 space-y-3">
        <p><strong>Client:</strong> {{ $booking->contact_name }}</p>
        <p><strong>Email:</strong> {{ $booking->contact_email }}</p>
        <p><strong>Phone:</strong> {{ $booking->contact_phone }}</p>
        <p><strong>Status:</strong> {{ $booking->status }}</p>
        <p><strong>Admin notes:</strong> {{ $booking->admin_notes ?: 'None' }}</p>

        <div>
            <h2 class="font-semibold mb-2">Services</h2>
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($booking->services as $service)
                    <li>{{ $service->name }} x {{ $service->pivot->quantity }}</li>
                @endforeach
            </ul>
        </div>

        @if ($booking->paymentProof)
            <div><strong>Payment proof:</strong> {{ $booking->paymentProof->file_path }}</div>
        @endif
    </div>

    <form method="POST" action="{{ route('admin.bookings.update-status', $booking) }}" class="mt-6 space-y-3 rounded-lg border border-gray-200 p-6">
        @csrf
        @method('PATCH')
        <h2 class="text-xl font-semibold">Update status</h2>
        <select name="status" class="w-full rounded-md border border-gray-300 px-3 py-2">
            @foreach (['pending','approved','awaiting_payment','confirmed','cancelled'] as $status)
                <option value="{{ $status }}" @selected($booking->status === $status)>{{ $status }}</option>
            @endforeach
        </select>
        <textarea name="admin_notes" rows="4" class="w-full rounded-md border border-gray-300 px-3 py-2" placeholder="Admin notes">{{ $booking->admin_notes }}</textarea>
        <button type="submit" class="rounded-md bg-black px-5 py-2 text-white">Save</button>
    </form>
</div>
@endsection