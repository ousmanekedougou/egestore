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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->integer('amount')->nullable();
            $table
              ->foreignId("client_id")
              ->references("id")
              ->on("clients")
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
        Schema::dropIfExists('payments');
    }
};
