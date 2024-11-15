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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('slug')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('logo')->nullable();
            $table->string('adresse')->nullable();
            $table->string('registre_com')->nullable();
            $table->string('ninea')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('abnonement')->default(false);
            $table->integer("supply_id")->nullable();
            $table
                ->foreignId("magasin_id")
                ->references("id")
                ->on("magasins")
                ->cascadeOnDelete()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
