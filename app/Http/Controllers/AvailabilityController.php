<?php

namespace App\Http\Controllers;

use App\Models\AvailabilityOverride;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class AvailabilityController extends Controller
{
    public function index(Request $request): View
    {
        $month = $this->resolveMonth((string) $request->query('month', now()->format('Y-m')));
        $today = Carbon::today();

        $calendarStart = $month->copy()->startOfWeek(Carbon::SUNDAY);
        $calendarEnd = $month->copy()->endOfMonth()->endOfWeek(Carbon::SATURDAY);

        $bookingCounts = Booking::query()
            ->selectRaw('event_date, COUNT(*) as aggregate')
            ->whereDate('event_date', '>=', $calendarStart->toDateString())
            ->whereDate('event_date', '<=', $calendarEnd->toDateString())
            ->where('status', '!=', Booking::STATUS_CANCELLED)
            ->groupBy('event_date')
            ->pluck('aggregate', 'event_date')
            ->map(fn ($count): int => (int) $count);

        $overrides = AvailabilityOverride::query()
            ->whereDate('date', '>=', $calendarStart->toDateString())
            ->whereDate('date', '<=', $calendarEnd->toDateString())
            ->get()
            ->keyBy(fn (AvailabilityOverride $override): string => $override->date->toDateString());

        $days = [];
        $cursor = $calendarStart->copy();

        while ($cursor->lte($calendarEnd)) {
            $dateString = $cursor->toDateString();
            $override = $overrides->get($dateString);
            $isBooked = $override ? (bool) $override->is_fully_booked : false;
            $isPast = $cursor->lt($today);

            $days[] = [
                'date' => $dateString,
                'day' => $cursor->day,
                'isCurrentMonth' => $cursor->month === $month->month,
                'isToday' => $cursor->isSameDay($today),
                'isPast' => $isPast,
                'isBooked' => $isBooked,
                'canBook' => ! $isPast && ! $isBooked,
                'bookingCount' => (int) ($bookingCounts[$dateString] ?? 0),
                'isManualOverride' => (bool) $override,
            ];

            $cursor->addDay();
        }

        return view('availability', [
            'monthLabel' => $month->format('F Y'),
            'currentMonth' => $month->format('Y-m'),
            'previousMonth' => $month->copy()->subMonthNoOverflow()->format('Y-m'),
            'nextMonth' => $month->copy()->addMonthNoOverflow()->format('Y-m'),
            'days' => $days,
            'isAdmin' => auth()->check() && auth()->user()?->isAdmin(),
        ]);
    }

    public function setDateStatus(Request $request, string $date): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:available,booked'],
            'month' => ['nullable', 'date_format:Y-m'],
        ]);

        $parsedDate = Carbon::createFromFormat('Y-m-d', $date)->toDateString();

        AvailabilityOverride::updateOrCreate(
            ['date' => $parsedDate],
            ['is_fully_booked' => $validated['status'] === 'booked']
        );

        return redirect()
            ->route('availability', ['month' => $validated['month'] ?? Carbon::parse($parsedDate)->format('Y-m')])
            ->with('success', 'Date availability updated successfully.');
    }

    private function resolveMonth(string $month): Carbon
    {
        try {
            return Carbon::createFromFormat('Y-m', $month)->startOfMonth();
        } catch (\Throwable) {
            return Carbon::now()->startOfMonth();
        }
    }
}