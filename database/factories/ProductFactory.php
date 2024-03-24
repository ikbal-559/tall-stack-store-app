<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'featured_image' => fake()->imageUrl(),
            'price_before_discount' => null,
            'price' => fake()->numberBetween(5500, 10000),
            'gripe_size' => fake()->numberBetween(3, 5),
            'weight' => fake()->numberBetween(70, 85),
            'lbs' => fake()->numberBetween(25, 35),
            'head_heavy' => fake()->numberBetween(1, 3)

        ];
    }
}
