<?php

namespace Database\Factories;

use App\Enums\PaymentMethodEnum;
use App\Enums\PaymentStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->unique()->randomNumber(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'method' => $this->faker->word(),
            'status' => $this->faker->word(),
            'total' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
