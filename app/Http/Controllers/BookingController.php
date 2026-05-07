<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UploadPaymentProofRequest;
use App\Models\Booking;
use App\Models\PaymentProof;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function create(): View
    {
        $serviceModels = Service::query()
            ->where('is_active', true)
            ->orderBy('category')
            ->orderBy('name')
            ->get();

        $services = $serviceModels
            ->map(function (Service $service): array {
                return [
                    'id' => $service->id,
                    'name' => $service->name,
                    'price' => (int) $service->price,
                    'priceLabel' => (int) $service->price === 0
                        ? 'Custom quote'
                        : '₱' . number_format($service->price),
                    'emoji' => $service->emoji,
                    'category' => $service->category,
                ];
            })
            ->values();

        $categories = $serviceModels
            ->pluck('category')
            ->filter()
            ->unique()
            ->values()
            ->map(fn (string $category): array => [
                'value' => $category,
                'label' => ucwords(str_replace(['_', '-'], ' ', $category)),
            ])
            ->all();

        return view('booking.create', [
            'today' => Carbon::today()->toDateString(),
            'services' => $services,
            'categories' => $categories,
        ]);
    }

    public function store(StoreBookingRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request): void {
            $booking = Booking::create([
                'user_id' => $request->user()->id,
                'event_date' => $request->date('event_date')->toDateString(),
                'event_details' => $request->input('event_details'),
                'contact_name' => $request->input('contact_name'),
                'contact_email' => $request->input('contact_email'),
                'contact_phone' => $request->input('contact_phone'),
                'status' => Booking::STATUS_PENDING,
            ]);

            $selectedServiceIds = collect($request->input('services', []))
                ->filter(fn (array $serviceData): bool => (bool) ($serviceData['selected'] ?? false))
                ->keys()
                ->map(fn ($serviceId): int => (int) $serviceId)
                ->all();

            $services = Service::query()->whereIn('id', $selectedServiceIds)->get()->keyBy('id');

            foreach ($request->input('services', []) as $serviceId => $serviceData) {
                if (empty($serviceData['selected'])) {
                    continue;
                }

                $service = $services->get((int) $serviceId);

                if (! $service) {
                    continue;
                }

                $booking->services()->attach($service->id, [
                    'quantity' => (int) ($serviceData['quantity'] ?? 1),
                    'unit_price' => (int) $service->price,
                ]);
            }
        });

        return redirect()->route('bookings.index')->with('booking_success', true);
    }

    public function index(Request $request): View
    {
        $bookings = $request->user()
            ->bookings()
            ->with(['services', 'paymentProof'])
            ->latest()
            ->paginate(10);

        return view('booking.index', [
            'bookings' => $bookings,
        ]);
    }

    public function show(Booking $booking): View
    {
        abort_unless($booking->user_id === auth()->id(), 403);

        $booking->load(['user', 'services', 'paymentProof']);

        return view('booking.show', [
            'booking' => $booking,
        ]);
    }

    public function uploadPayment(UploadPaymentProofRequest $request, Booking $booking): RedirectResponse
    {
        abort_unless($booking->user_id === auth()->id(), 403);

        $path = $request->file('payment_file')->store('payment_proofs', 'public');

        PaymentProof::updateOrCreate(
            ['booking_id' => $booking->id],
            [
                'file_path' => $path,
                'uploaded_at' => now(),
                'verified_at' => null,
            ]
        );

        $booking->update([
            'status' => Booking::STATUS_AWAITING_PAYMENT,
        ]);

        return back()->with('success', 'Payment proof uploaded successfully.');
    }
}