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
          $table->string('image');
          $table->text('images')->nullable();
          $table->integer('price');
          $table->integer('price_achat')->nullable();
          $table->integer('price_revenu')->nullable();
          $table->integer('promo_price')->nullable();
          $table->integer('quantity');
          $table->integer('qty_alert');
          $table->integer('stock')->nullable();
          $table->text('colors')->nullable();
          $table->text('sizes')->nullable();
          $table->string('reference');
          $table->boolean('visible')->default(false);
          $table->boolean('promot')->default(false)->nullable();
          $table->text('desc')->nullable();
          $table->date('exp_date')->nullable();
          $table->integer('supply_id')->nullable();
          $table->string('supply_name')->nullable();
          
          $table
            ->foreignId("magasin_id")
            ->references("id")
            ->on("magasins")
            ->cascadeOnDelete();

          $table
            ->foreignId("order_id")
            ->references("id")
            ->on("orders")
            ->cascadeOnDelete()->nullable();
            
          $table
            ->foreignId("sub_category_id")
            ->references("id")
            ->on("sub_categories")
            ->cascadeOnDelete();
          $table->rememberToken();
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
