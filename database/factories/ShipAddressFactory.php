<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShipAddress>
 */
class ShipAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'ward' => $this->faker->word(),
            'district' => $this->faker->city(),
            'city' => $this->faker->state(),
            'postal_code' => $this->faker->postcode(),
            'country' => 'Vietnam', // Quốc gia cố định
        ];
    }
}
