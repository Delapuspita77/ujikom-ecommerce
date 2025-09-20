<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feedbacks;

class FeedbackSeeder extends Seeder
{
    public function run(): void
    {
        Feedbacks::create([
            'user_id'    => 2,
            'product_id' => 1,
            'rating'     => 5,
            'comment'    => 'Sangat membantu untuk meredakan sakit kepala!',
        ]);
    }
}
