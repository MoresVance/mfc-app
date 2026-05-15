<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            // Decor - Custom Quote (price 0)
            ['emoji' => '🎈', 'name' => 'Balloon Backdrop', 'price' => 0, 'category' => 'decor'],
            ['emoji' => '🏛️', 'name' => 'Entrance Arch', 'price' => 0, 'category' => 'decor'],
            ['emoji' => '🎪', 'name' => 'Full Venue Setup', 'price' => 0, 'category' => 'decor'],
            ['emoji' => '🎈', 'name' => 'Balloon Stand / Pillars', 'price' => 0, 'category' => 'decor'],
            ['emoji' => '💐', 'name' => 'Balloon Bouquets', 'price' => 0, 'category' => 'decor'],
            ['emoji' => '🎈', 'name' => 'Balloon Centerpieces', 'price' => 0, 'category' => 'decor'],

            // Entertainment
            ['emoji' => '🎤', 'name' => 'Party Host', 'price' => 3500, 'category' => 'entertainment'],
            ['emoji' => '🤡', 'name' => 'Clown', 'price' => 1000, 'category' => 'entertainment'],
            ['emoji' => '✨', 'name' => 'Magician', 'price' => 5000, 'category' => 'entertainment'],
            ['emoji' => '🎭', 'name' => 'Mascot', 'price' => 1500, 'category' => 'entertainment'],
            ['emoji' => '🫧', 'name' => 'Bubble Show', 'price' => 2500, 'category' => 'entertainment'],
            ['emoji' => '🎈', 'name' => 'Balloon Twister', 'price' => 2500, 'category' => 'entertainment'],
            ['emoji' => '🎨', 'name' => 'Face Painting', 'price' => 2500, 'category' => 'entertainment'],

            // Food Carts
            ['emoji' => '🍭', 'name' => 'Cotton Candy', 'price' => 1800, 'category' => 'food_carts'],
            ['emoji' => '🍿', 'name' => 'Popcorn', 'price' => 1800, 'category' => 'food_carts'],
            ['emoji' => '🌭', 'name' => 'Hotdog', 'price' => 1800, 'category' => 'food_carts'],
            ['emoji' => '🍦', 'name' => 'Ice Cream', 'price' => 2800, 'category' => 'food_carts'],
            ['emoji' => '🍟', 'name' => 'French Fries', 'price' => 2800, 'category' => 'food_carts'],
            ['emoji' => '🍴', 'name' => 'Street Foods', 'price' => 2800, 'category' => 'food_carts'],
            ['emoji' => '🌭', 'name' => 'Corndog', 'price' => 2800, 'category' => 'food_carts'],
            ['emoji' => '🧇', 'name' => 'Hotdog Waffle', 'price' => 2800, 'category' => 'food_carts'],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['name' => $service['name']],
                $service + ['is_active' => true]
            );
        }
    }
}