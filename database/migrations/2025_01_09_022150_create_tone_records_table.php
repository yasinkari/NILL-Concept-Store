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
        Schema::create('tone_records', function (Blueprint $table) {
            $table->id('tone_recordID');
            $table->foreignId('toneID')->constrained('tones', 'toneID');
            $table->foreignId('colorID')->constrained('product_colors', 'colorID');
            $table->foreignId('productID')->constrained('products', 'productID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tone_records');
    }
};
