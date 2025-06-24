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
        Schema::create('product_color_sizes', function (Blueprint $table) {
            $table->id();
            
            $table->integer('quantity');

            $table
              ->foreignId("product_id")
              ->references("id")
              ->on("users")
              ->cascadeOnDelete('set null');

            $table
              ->foreignId("color_id")
              ->references("id")
              ->on("magasins")
              ->cascadeOnDelete('set null');

            $table
              ->foreignId("size_id")
              ->references("id")
              ->on("magasins")
              ->cascadeOnDelete('set null');

            $table
              ->foreignId("magasin_id")
              ->references("id")
              ->on("magasins")
              ->cascadeOnDelete('set null');

              $table->boolean('visible')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodcut_color_sizes');
    }
};
