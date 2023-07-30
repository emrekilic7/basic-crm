<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'name' => $this->faker->name,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'avatar' => null,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'province' => 1,
            'district' => 1
        ];
    }
}
