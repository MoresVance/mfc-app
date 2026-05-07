<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookingStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['required', Rule::in([
                Booking::STATUS_PENDING,
                Booking::STATUS_APPROVED,
                Booking::STATUS_AWAITING_PAYMENT,
                Booking::STATUS_CONFIRMED,
                Booking::STATUS_CANCELLED,
                Booking::STATUS_REJECTED,
            ])],
            'admin_notes' => ['nullable', 'string', 'max:1000'],
        ];
    }
}