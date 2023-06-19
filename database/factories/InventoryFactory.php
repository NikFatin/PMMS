<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'user_id' => $this-> faker->unique()->randomNumber(),
            'name' => $this-> faker->word,
            'quantity' => $this-> faker->numberBetween(0, 100),
            'expirydate' => $this-> faker->dateTimeBetween('+1 week', '+1 year'),
            'appstatus' => $this-> faker->randomElement(['pending', 'approved', 'rejected']),
            'apprequest' => $this-> faker->sentence,
        ];
    }
}
