<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Assuming orders are associated with users.
            'total_amount' => fake()->randomFloat(2, 10, 1000), // Generate a random total amount.
            'status' => fake()->randomElement(['pending', 'completed', 'cancelled']), // Random order status.
        ];
    }
}
