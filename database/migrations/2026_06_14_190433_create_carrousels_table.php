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
        Schema::create('carrousels', function (Blueprint $table) {
            $table->id();
            $table->String('titulo', 50);
            $table->String('slug', 50);
            $table->String('desc', 150)->nullable();
            $table->json('imgs')->nullable();
            $table->String('model_3D_path')->nullable();
            $table->boolean('is_Active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrousels');
    }
};
