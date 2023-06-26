<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recruiter>
 */
class RecruiterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => Hash::make('12345'),
            'phone' => fake()->phoneNumber(),
            'location' => fake()->streetAddress(),
            'recruiter_level' => fake()->randomDigitNotNull(),
            'email_verified_at' => fake()->dateTime(),
        ];
    }
}
