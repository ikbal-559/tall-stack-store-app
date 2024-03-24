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
            $table->string('featured_image');

            $table->decimal('price_before_discount')->nullable();
            $table->decimal('price');

            $table->string('gripe_size', 10)->nullable();
            $table->unsignedTinyInteger('weight')->nullable();
            $table->unsignedTinyInteger('lbs')->nullable();
            $table->unsignedTinyInteger('head_heavy')->nullable();


            $table->foreignId( 'brand_id' )->index()->references('id')->on('brands');
            $table->foreignId( 'category_id' )->index()->references('id')->on('categories');
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
