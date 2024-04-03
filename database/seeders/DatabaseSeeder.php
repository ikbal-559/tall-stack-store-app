<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\ProductMeta;
use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@admin.com',
        ]);

        $brand = Brand::factory()->create([
            'name' => 'Ashaway',
            'slug' => 'ashaway'
        ]);
        $category = Category::factory()->create(['name' => 'Quantum','brand_id' => $brand->id]);
        $this->createProduct($brand, $category);
        $category = Category::factory()->create(['name' => 'Phantom','brand_id' => $brand->id]);
        $this->createProduct($brand, $category);
        $category = Category::factory()->create(['name' => 'Viper','brand_id' => $brand->id]);
        $this->createProduct($brand, $category);

        $brand = Brand::factory()->create([
            'name' => 'Lining',
            'slug' => 'lining'
        ]);
        $category = Category::factory()->create(['name' => 'Tectonic','brand_id' => $brand->id]);
        $this->createProduct($brand, $category);
        $category = Category::factory()->create(['name' => 'Axforce','brand_id' => $brand->id]);
        $this->createProduct($brand, $category);
        $category = Category::factory()->create(['name' => 'Air Force','brand_id' => $brand->id]);
        $this->createProduct($brand, $category);
        $category = Category::factory()->create(['name' => 'G-Force','brand_id' => $brand->id]);
        $this->createProduct($brand, $category);



    }

    private function createProduct($brand, $category){
        for ($i = 1; $i <= rand(5,30); $i++){
            $product = Product::factory()->create([
                'brand_id' => $brand,
                'category_id' => $category,
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
