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
        Schema::create("recipes", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->nullable()->constrained()->onDelete("set null");
            $table->string("title");
            $table->string("description");
            $table->json("steps");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
