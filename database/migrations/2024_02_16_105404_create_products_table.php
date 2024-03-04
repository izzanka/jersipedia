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
            $table->foreignId('league_id')->constrained();
            $table->string('name');
            $table->string('name_slug');
            $table->text('description');
            $table->integer('price');
            $table->integer('stock')->default(0);
            $table->integer('sold')->default(0);
            $table->string('image');
            $table->integer('weight')->default(250);
            $table->string('avg_review_ratings')->default('0');
            $table->integer('total_reviews')->default(0);
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
