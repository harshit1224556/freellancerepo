<?php

namespace Database\Factories;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'role' => fake()->randomElement(['SEO Specialist', 'Content Writer', 'Social Media Manager', 'Graphic Designer', 'Web Developer', 'Marketing Director']),
            'status' => fake()->randomElement(['pending', 'reviewed', 'hired', 'rejected']),
        ];
    }
}
