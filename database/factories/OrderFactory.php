<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'          => fake()->uuid(),
            'user_id'     => User::inRandomOrder()->first()->id,
            'email'       => $this->faker->safeEmail(),
            'shipped_to'  => $this->faker->address(),
            'status'      => $this->faker->randomElement(['pending', 'confirmed', 'processing', 'shipped', 'delivered', 'cancelled', 'refunded', 'failed']),
            'total_price' => $this->faker->randomFloat(2, 10, 1000),
            'ordered_at'  => now(),
            'updated_at'  => now(),
        ];
    }
}
