<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'nim' => $this->faker->unique()->numberBetween(200602001, 200602999),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'birth_date' => $this->faker->dateTimeBetween('-30 years', '-1 years'),
        ];
    }
}
