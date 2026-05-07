<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('availability_overrides', function (Blueprint $table): void {
            $table->id();
            $table->date('date')->unique();
            $table->boolean('is_fully_booked')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('availability_overrides');
    }
};