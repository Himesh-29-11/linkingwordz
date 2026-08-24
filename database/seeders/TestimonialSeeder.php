<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::query()->delete();

        Testimonial::query()->insert([
            ['quote' => 'I just finished going over chapter one! Thank you so much for your input, I used quite a few of your suggestions. I want to say probably about 85% of them. Thank you for reviewing this for me.', 'name' => 'Eve Miller', 'role' => 'Author', 'sort_order' => 1],
            ['quote' => 'Shruti worked with us on proofreading our product notes and a few blogs. She is a thorough professional, punctual with deadlines, and most importantly an expert in her field. We wish you all the best for all your future endeavors.', 'name' => 'Paintphotographs', 'role' => 'Client', 'sort_order' => 2],
            ['quote' => 'Shruti has been working as a reviewer in my team for more than 2.5 years. She is a team player and has a very good command over the language, on time delivery, accuracy, high standard work ethics are some of her bright qualities. She is an asset to any team she works for.', 'name' => 'Rushabh Shah', 'role' => 'Client', 'sort_order' => 3],
        ]);
    }
}
