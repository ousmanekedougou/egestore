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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->integer('type')->nullable();
            $table
              ->foreignId("category_id")
              ->references("id")
              ->on("categories")
              ->cascadeOnDelete();
            $table
              ->foreignId("magasin_id")
              ->references("id")
              ->on("categories")
              ->cascadeOnDelete();
            $table->boolean('visible');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
