<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subscriber;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscribers = [
            [
                'email' => 'john.doe@example.com',
                'name' => 'John Doe',
                'is_active' => true,
                'subscribed_at' => now()->subDays(10)
            ],
            [
                'email' => 'jane.smith@example.com',
                'name' => 'Jane Smith',
                'is_active' => true,
                'subscribed_at' => now()->subDays(5)
            ],
            [
                'email' => 'mike.wilson@example.com',
                'name' => 'Mike Wilson',
                'is_active' => true,
                'subscribed_at' => now()->subDays(3)
            ],
            [
                'email' => 'sarah.johnson@example.com',
                'name' => 'Sarah Johnson',
                'is_active' => false,
                'subscribed_at' => now()->subDays(15)
            ],
            [
                'email' => 'alex.brown@example.com',
                'name' => 'Alex Brown',
                'is_active' => true,
                'subscribed_at' => now()->subDays(1)
            ],
            [
                'email' => 'lisa.davis@example.com',
                'name' => 'Lisa Davis',
                'is_active' => true,
                'subscribed_at' => now()->subHours(12)
            ],
            [
                'email' => 'test@example.com',
                'name' => null,
                'is_active' => true,
                'subscribed_at' => now()->subHours(6)
            ]
        ];

        foreach ($subscribers as $subscriber) {
            Subscriber::create($subscriber);
        }
    }
}

