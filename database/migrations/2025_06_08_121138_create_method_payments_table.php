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
        Schema::create('method_payments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->nullable();
            $table->string('clientId')->unique();
            $table->string('clientSecret')->unique();
            $table->boolean('status')->default(false);
            $table->boolean('visible')->nullable();
            $table->foreignId("magasin_id")
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
        Schema::dropIfExists('method_payments');
    }
};
