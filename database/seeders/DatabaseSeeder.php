<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Job;
use App\Models\Application;
use App\Models\Resume;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 3 test users
        User::factory(3)->create();

        $users = User::all();

        $users->each(function ($user) {
            // Each user has 3 companies
            $companies = Company::factory(3)->create();

            // Each user has 5 jobs across those companies
            $jobs = $companies->map(function ($company) use ($user) {
                return Job::factory(2)->create([
                    'user_id'    => $user->id,
                    'company_id' => $company->id,
                ]);
            })->flatten();

            // Each user has applications for those jobs
            $jobs->each(function ($job) use ($user) {
                Application::factory()->create([
                    'user_id' => $user->id,
                    'job_id'  => $job->id,
                ]);
            });

            // Each user has 1 resume
            Resume::factory()->create([
                'user_id'    => $user->id,
                'is_primary' => true,
            ]);
        });
    }
}
