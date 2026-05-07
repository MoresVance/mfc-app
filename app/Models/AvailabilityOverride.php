<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailabilityOverride extends Model
{
    protected $fillable = [
        'date',
        'is_fully_booked',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'is_fully_booked' => 'boolean',
        ];
    }
}