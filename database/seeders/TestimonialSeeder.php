<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonials = [
            [
                'name' => 'Hasanuzzman Shohag',
                'position' => 'Senior Developer',
                'company' => 'Tech Solutions Ltd',
                'testimonial' => 'This guy is very honest, skilled at tech. I have been working with him for more than 7 years and still working with him. His experience is unbelievable. I highly recommend him.',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Project Manager',
                'company' => 'Digital Innovations Inc',
                'testimonial' => 'Saiful delivered an exceptional e-commerce platform for our business. His attention to detail and technical expertise exceeded our expectations. The project was completed on time and within budget.',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'CTO',
                'company' => 'StartupXYZ',
                'testimonial' => 'Working with Saiful has been a game-changer for our startup. His full-stack development skills and ability to scale applications have been crucial to our success. Highly recommended!',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'name' => 'Emily Rodriguez',
                'position' => 'Product Owner',
                'company' => 'Global Tech Corp',
                'testimonial' => 'Saiful\'s expertise in Laravel and Python development helped us build a robust ERP system. His problem-solving skills and dedication to quality are outstanding.',
                'rating' => 4,
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'name' => 'David Wilson',
                'position' => 'CEO',
                'company' => 'CloudTech Solutions',
                'testimonial' => 'The mobile app developed by Saiful using Flutter has been a huge success. His understanding of both frontend and backend development made the entire process smooth and efficient.',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => 5
            ]
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}

