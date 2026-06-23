<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'         => \App\Models\User::factory(),
            'job_id'          => \App\Models\Job::factory(),
            'status'          => fake()->randomElement([
                'saved', 'applied', 'interview', 'offer', 'rejected'
            ]),
            'applied_date'    => fake()->dateTimeBetween('-3 months', 'now'),
            'follow_up_date'  => fake()->dateTimeBetween('now', '+1 month'),
            'match_score'     => fake()->numberBetween(40, 95),
            'notes'           => fake()->sentence(),
        ];
    }
}
