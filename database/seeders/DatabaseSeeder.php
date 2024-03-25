<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\ProductMeta;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\BrandFactory;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        Brand::factory(5)->create();
        Category::factory(10)->create();

        for ($i = 1; $i <= 50; $i++){
           $product = Product::factory()->create([
                'brand_id' => Brand::orderBy(DB::raw('RAND()'))->first()->id,
                'category_id' => Category::orderBy(DB::raw('RAND()'))->first()->id,
            ]);
           ProductDetails::factory()->create([
               'product_id' => $product->id
           ]);
           ProductMeta::create(
               [
                   'product_id' => $product->id,
                   'meta_key' =>'Gripe Size',
                   'meta_value' =>'3U'
               ]
           );
        }

    }
}
