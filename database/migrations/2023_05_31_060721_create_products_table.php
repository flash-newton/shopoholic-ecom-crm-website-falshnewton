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
            $table->unsignedBigInteger('category_id');
            $table->string('prod_img')->nullable();
            $table->string('name');
            $table->string('description');
            $table->integer('actual_price');
            $table->integer('discount');
            $table->integer('sold_price');
            $table->integer('stock');
            $table->integer('soldcount')->default('0');
            $table->string('sub_category')->nullable();
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
        Schema::dropIfExists('products');
    }
};
