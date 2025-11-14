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
            $table->string('product_name');
            $table->string('product_image');
            $table->string('product_size');
            $table->string('product_color');
            $table->decimal('product_price', 10, 2);
            $table->integer('quantity');
            $table->foreignId('brand_id')->constrained(table: 'brands');
            $table->foreignId('category_id')->constrained(table: 'categories');
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