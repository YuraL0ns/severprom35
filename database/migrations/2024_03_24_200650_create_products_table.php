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
            $table->string('categories_code');
            $table->foreign('categories_code')->references('code')->on('categories')->onDelete('cascade');
            $table->string('external_id')->unique();
            $table->string('name');
            $table->string('article')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('main_image')->nullable();
            $table->string('price');
            $table->string('wholesale_price')->nullable();
            $table->string('currency');
            $table->integer('weight');
            $table->integer('length');
            $table->integer('height');
            $table->integer('width');
            $table->string('unit')->nullable();
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
