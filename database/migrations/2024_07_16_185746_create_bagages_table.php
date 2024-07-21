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
        Schema::create('bagages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->text('images')->nullable();
            $table->integer('price');
            $table->integer('quantity');
            $table->string('reference');
            $table->boolean('type')->default(false);
            $table
                ->foreignId("commande_id")
                ->references("id")
                ->on("commandes")
                ->cascadeOnDelete()->nullable();
            $table
                ->foreignId("magasin_id")
                ->references("id")
                ->on("magasins")
                ->cascadeOnDelete()->nullable();
            $table->dateTime('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bagages');
    }
};
