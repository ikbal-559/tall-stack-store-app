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
        $randomImages =[
            'https://strapiproduction-16636.kxcdn.com/uploads/01_21_39_35c0c4d801/01_21_39_35c0c4d801.jpg?width=1080&quality=83',
            'https://strapiproduction-16636.kxcdn.com/uploads/Template_01_5ff2c721c0/Template_01_5ff2c721c0.jpg?width=1080&quality=83',
            'https://strapiproduction-16636.kxcdn.com/uploads/AYPS_327_4_01_a1571bb331/AYPS_327_4_01_a1571bb331.jpg?width=1080&quality=83',
            'https://strapiproduction-16636.kxcdn.com/uploads/AYPS_319_4_01_8e034787bb/AYPS_319_4_01_8e034787bb.jpg?width=1080',
            'https://strapiproduction-16636.kxcdn.com/uploads/AYPS_203_4_01_25911742d3/AYPS_203_4_01_25911742d3.jpg?width=1080&quality=83'
        ];
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'featured_image' => $randomImages[rand(0,4)],
            'price_before_discount' => null,
            'price' => fake()->numberBetween(5500, 10000),
            'product_type' => ProductType::Racket
        ];
    }
}
