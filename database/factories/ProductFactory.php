<?php

namespace Database\Factories;

use App\Enums\ProductType;
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
        $name = fake()->name;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'featured_image' => 'https://strapiproduction-16636.kxcdn.com/uploads/AYPS_203_4_01_25911742d3/AYPS_203_4_01_25911742d3.jpg?width=1080&quality=83',
            'price_before_discount' => null,
            'price' => fake()->numberBetween(5500, 10000),
            'product_type' => ProductType::Racket
        ];
    }
}
