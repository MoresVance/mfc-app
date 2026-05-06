@extends('layouts.app', ['title' => 'Booking Details'])

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold">Booking Details</h1>
        <a href="{{ route('bookings.index') }}" class="text-sm underline">Back to bookings</a>
    </div>

    <div class="rounded-lg border border-gray-200 p-6 space-y-3">
        <p><strong>Status:</strong> {{ $booking->status }}</p>
        <p><strong>Event date:</strong> {{ $booking->event_date->toFormattedDateString() }}</p>
        <p><strong>Contact:</strong> {{ $booking->contact_name }} · {{ $booking->contact_email }} · {{ $booking->contact_phone }}</p>
        <p><strong>Details:</strong> {{ $booking->event_details ?: 'None' }}</p>

        <div>
            <h2 class="font-semibold mb-2">Services</h2>
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($booking->services as $service)
                    <li>{{ $service->name }} x {{ $service->pivot->quantity }} (₱{{ number_format($service->pivot->unit_price) }})</li>
                @endforeach
            </ul>
        </div>

        <div>
            <strong>Subtotal:</strong> ₱{{ number_format($booking->subtotal()) }}
        </div>

        @if ($booking->paymentProof)
            <div>
                <strong>Payment proof:</strong> {{ $booking->paymentProof->file_path }}
            </div>
        @endif
    </div>

    <form method="POST" action="{{ route('bookings.upload-payment', $booking) }}" enctype="multipart/form-data" class="mt-6 space-y-3 rounded-lg border border-gray-200 p-6">
        @csrf
        <h2 class="text-xl font-semibold">Upload payment proof</h2>
        <input type="file" name="payment_file" class="block w-full text-sm">
        @error('payment_file')<span class="text-sm text-red-600">{{ $message }}</span>@enderror
        <button type="submit" class="rounded-md bg-black px-5 py-2 text-white">Upload</button>
    </form>
</div>
@endsection