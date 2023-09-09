<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        'user_id' => function () {
            return User::inRandomOrder()->first()->id;
        },
        'order_date' => $this->faker->dateTimeThisMonth(),
        'total_price' => $this->faker->randomFloat(2, 10, 500),
        'shipping_address' => $this->faker->address,
        'order_status' => $this->faker->randomElement(['Processing', 'Shipped', 'Delivered']),
        'payment_status' => $this->faker->randomElement(['Paid', 'Pending', 'Failed']),
    ];
    }
}
