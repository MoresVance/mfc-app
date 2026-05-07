<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'event_date' => ['required', 'date', 'after_or_equal:today'],
            'services' => ['required', 'array', 'min:1'],
            'services.*.selected' => ['sometimes', 'boolean'],
            'services.*.quantity' => ['nullable', 'integer', 'min:0', 'max:99'],
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' => ['required', 'email', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:20'],
            'event_details' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            $services = collect($this->input('services', []));

            $hasSelectedService = $services
                ->contains(fn (array $serviceData): bool => ! empty($serviceData['selected']));

            if (! $hasSelectedService) {
                $validator->errors()->add('services', 'Please select at least one service.');
            }

            $services->each(function (array $serviceData, $serviceId) use ($validator): void {
                if (empty($serviceData['selected'])) {
                    return;
                }

                $quantity = (int) ($serviceData['quantity'] ?? 0);

                if ($quantity < 1 || $quantity > 99) {
                    $validator->errors()->add(
                        "services.$serviceId.quantity",
                        'Selected service quantity must be between 1 and 99.'
                    );
                }
            });
        });
    }
}