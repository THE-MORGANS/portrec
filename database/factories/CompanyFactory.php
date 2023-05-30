<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'recruiter_id' => fake()->numberBetween(1, 3),
            'name' => fake()->name(),
            'cac' => fake()->word(),
            'company_type_id' => fake()->numberBetween(1, 3),
            'company_industry' => fake()->word(),
            'website' => fake()->url(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'logo' => fake()->url(),
            'image' => fake()->url(),
            'description' => fake()->text(),
            
        ];
    }
}
