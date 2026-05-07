<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBookingStatusRequest;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class AdminBookingController extends Controller
{
    public function index(Request $request): View
    {
        $status = (string) $request->input('status', '');
        $search = (string) $request->input('search', '');

        $bookings = Booking::query()
            ->with(['user', 'services', 'paymentProof'])
            ->when($status !== '', fn ($query) => $query->where('status', $status))
            ->when($search !== '', function ($query) use ($search): void {

                $query->where(function ($subQuery) use ($search): void {
                    $subQuery->where('contact_name', 'like', '%' . $search . '%')
                        ->orWhere('contact_email', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.bookings.index', [
            'bookings' => $bookings,
        ]);
    }

    public function show(Booking $booking): View
    {
        $booking->load(['user', 'services', 'paymentProof']);

        return view('admin.bookings.show', [
            'booking' => $booking,
        ]);
    }

    public function updateStatus(UpdateBookingStatusRequest $request, Booking $booking)
    {
        $booking->update([
            'status' => $request->input('status'),
            'admin_notes' => $request->input('admin_notes'),
        ]);

        return redirect()
            ->route('admin.bookings.show', $booking)
            ->with('success', 'Booking status updated successfully.');
    }

    public function calendar(Request $request): View
    {
        try {
            $month = Carbon::createFromFormat('Y-m', (string) $request->query('month', now()->format('Y-m')));
        } catch (\Throwable) {
            $month = now();
        }

        $bookings = Booking::query()
            ->whereYear('event_date', $month->year)
            ->whereMonth('event_date', $month->month)
            ->orderBy('event_date')
            ->get()
            ->groupBy(fn (Booking $booking) => $booking->event_date->toDateString());

        return view('admin.bookings.calendar', [
            'month' => $month,
            'bookingsByDate' => $bookings,
        ]);
    }
}