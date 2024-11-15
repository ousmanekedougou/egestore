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
        Schema::create('supply_order_products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('image');
            $table->text('images')->nullable();
            $table->integer('price');
            $table->integer('quantity');
            $table->text('colors')->nullable();
            $table->text('sizes')->nullable();
            $table->string('reference');
            $table->boolean('visible')->default(false);
            $table->text('desc')->nullable();
            $table->string('amount')->nullable();
            $table
                ->foreignId("sub_category_id")
                ->references("id")
                ->on("sub_categories")
                ->cascadeOnDelete();
            $table
                ->foreignId("supply_order_id")
                ->references("id")
                ->on("supply_orders")
                ->cascadeOnDelete()->nullable();
            
            $table
                ->foreignId("magasin_id")
                ->references("id")
                ->on("magasins")
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suply_order_products');
    }
};
