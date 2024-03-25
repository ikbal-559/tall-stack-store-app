<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('featured_image');

            $table->unsignedTinyInteger('product_type')->nullable();

            $table->decimal('price_before_discount')->nullable();
            $table->decimal('price');


            $table->foreignId( 'brand_id' )->index()->references('id')->on('brands');
            $table->foreignId( 'category_id' )->index()->references('id')->on('categories');

            $table->unsignedTinyInteger('in_stock')->default(1);
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
