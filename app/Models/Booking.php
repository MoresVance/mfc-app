<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_date',
        'event_details',
        'contact_name',
        'contact_email',
        'contact_phone',
        'status',
        'admin_notes',
    ];

    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_AWAITING_PAYMENT = 'awaiting_payment';
    public const STATUS_CONFIRMED = 'confirmed';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_REJECTED = 'rejected';

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'booking_services')
            ->withPivot(['quantity', 'unit_price'])
            ->withTimestamps();
    }

    public function paymentProof(): HasOne
    {
        return $this->hasOne(PaymentProof::class);
    }

    public function subtotal(): int
    {
        return (int) $this->services->sum(function (Service $service): int {
            return ((int) $service->pivot->unit_price) * ((int) $service->pivot->quantity);
        });
    }

    /**
     * Human-friendly subtotal display.
     * If any attached service has a unit_price of 0 it is treated as a "Custom quote".
     * Returns strings like "Custom quote", "₱3,500", or "₱3,500 + Custom quote".
     */
    public function subtotalDisplay(): string
    {
        $subtotal = $this->subtotal();
        $hasCustom = $this->services->contains(function (Service $service) {
            return ((int) $service->pivot->unit_price) === 0;
        });

        if ($hasCustom) {
            if ($subtotal > 0) {
                return '₱' . number_format($subtotal) . ' + Custom quote';
            }

            return 'Custom quote';
        }

        return '₱' . number_format($subtotal);
    }
}