<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
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
            'company_id'      => \App\Models\Company::factory(),
            'title'           => fake()->randomElement([
                'Backend Developer', 'Laravel Developer', 'PHP Engineer',
                'Full Stack Developer', 'Senior Software Engineer'
            ]),
            'url'             => fake()->url(),
            'description'     => fake()->paragraphs(3, true),
            'required_skills' => fake()->randomElement([
                'PHP, Laravel, MySQL', 'Laravel, Redis, Docker', 'PHP, AWS, REST API'
            ]),
            'job_type'        => fake()->randomElement(['full-time', 'contract', 'remote']),
            'salary_range'    => fake()->randomElement([
                '10-15 LPA', '15-20 LPA', '20-30 LPA', '30+ LPA'
            ]),
            'location'        => fake()->city(),
        ];
    }
}
