<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => function () {
                return Order::inRandomOrder()->first()->id;
            },
            'product_id' => function () {
                return Product::inRandomOrder()->first()->id;
            },
            'quantity' => $this->faker->numberBetween(1, 5),
            'subtotal' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}
