<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['emoji' => '🎈', 'name' => 'Balloon Arch Package', 'price' => 2500, 'category' => 'balloons'],
            ['emoji' => '🎪', 'name' => 'Photo Booth Rental', 'price' => 3800, 'category' => 'booths'],
            ['emoji' => '🎀', 'name' => 'Table Centerpiece Set', 'price' => 1200, 'category' => 'decor'],
            ['emoji' => '✨', 'name' => 'LED Backdrop Setup', 'price' => 4500, 'category' => 'decor'],
            ['emoji' => '🎉', 'name' => 'Party Streamer Kit', 'price' => 850, 'category' => 'balloons'],
            ['emoji' => '🌸', 'name' => 'Floral Decoration Bundle', 'price' => 3200, 'category' => 'decor'],
            ['emoji' => '🎂', 'name' => 'Dessert Table Setup', 'price' => 2900, 'category' => 'other'],
            ['emoji' => '🍕', 'name' => 'Food Cart Rental', 'price' => 5000, 'category' => 'food_carts'],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['name' => $service['name']],
                $service + ['is_active' => true]
            );
        }
    }
}