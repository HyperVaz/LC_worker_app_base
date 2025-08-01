<?php

namespace Database\Factories;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'city'=>fake()->city(),
            'skill'=>fake()->jobTitle(),
            'experience'=>fake()->numberBetween(1, 45),
            'finished_study_at'=>fake()->date('d-m-Y'),
        ];
    }
}
