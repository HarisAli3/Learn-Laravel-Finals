<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    /* In Tinker
        > App\Models\Job::factory()->create()
        > App\Models\Job::factory(300)->create()
    */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'employer_id' => Employer::factory(),
            'salary' => $this->faker->numberBetween($min = 10000, $max = 90000),
        ];
    }
}
