<?php

namespace Database\Factories;
use App\Models\Employment;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employment>
 */
class EmploymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'designation' => $this->faker->jobTitle,
            'job_scale' => $this->faker->randomElement(['Scale 1', 'Scale 2', 'Scale 3']),
            'organization' => $this->faker->company,
            'duties' => $this->faker->sentence(8),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->optional()->date(),
        ];
    }
}
