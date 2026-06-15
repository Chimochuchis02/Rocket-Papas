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
        Schema::create('carrousel_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->OnDelete('cascade');
            $table->foreignId('carrousel_id')->constrained('carrousels')->OnDelete('cascade');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrousel_product');
    }
};
