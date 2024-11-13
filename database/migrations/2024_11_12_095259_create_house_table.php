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
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->string('property_name');
            $table->string('description')->nullable();
            $table->foreignId('cat_id')->references('id')->on('category');
            $table->foreignId('loc_id')->references('id')->on('location');
            $table->foreignId('type_id')->references('id')->on('property_type');
            $table-> float('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property');
    }
};
