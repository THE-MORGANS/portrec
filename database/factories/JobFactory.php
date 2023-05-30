<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'recruiter_id' => fake()->numberBetween(1, 9),
            'company_id' => fake()->numberBetween(1, 9),
            'title' => fake()->sentence(2),
            'job_functions' => fake()->sentence(5),
            'qualifications' => fake()->name(),
            'location' => fake()->address(),
            'work_type_id' => fake()->numberBetween(1, 3),
            'experience' => fake()->sentence(5),
            'term' => fake()->word(),
            'min_salary' => fake()->randomNumber(5, true),
            'max_salary' => fake()->randomNumber(6, true),
            'deadline' => fake()->dateTime(),
            'description' => fake()->sentence(30),
        ];
    }
}
