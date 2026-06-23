<?php

namespace Database\Factories;

use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Resume>
 */
class ResumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'       => \App\Models\User::factory(),
            'filename'      => fake()->word() . '_resume.pdf',
            's3_path'       => 'resumes/' . fake()->uuid() . '.pdf',
            's3_url'        => fake()->url(),
            'parsed_skills' => 'PHP, Laravel, MySQL, Docker, Redis',
            'is_primary'    => false,
        ];
    }
}
