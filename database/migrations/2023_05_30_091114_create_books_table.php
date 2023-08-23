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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('bookimg');
            $table->string('name');
            $table->string('summary');
            $table->string('author');
            $table->integer('price');
            $table->integer('stock');
            $table->integer('soldcount')->default('0');
            $table->string('genre')->nullable();
            $table->integer('rating')->nullable();
            $table->tinyInteger('trending')->default('0')->comment('trending = 1 | not = 0');;
            $table->tinyInteger('status')->default('0')->comment('hidden = 1 | seen = 0');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
