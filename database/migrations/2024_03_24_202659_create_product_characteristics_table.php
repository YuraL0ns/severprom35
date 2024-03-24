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
        Schema::create('product_characteristics', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained()->onDelete('cascade');


            $table->string('producer')->nullable();
            $table->string('lifting_capacity')->nullable();
            $table->string('length')->nullable();
            $table->string('single_speed')->nullable();
            $table->string('reduced_height')->nullable();
            $table->string('lifting_height')->nullable();
            $table->string('packing_height')->nullable();
            $table->string('height')->nullable();
            $table->string('packing_depth')->nullable();
            $table->string('rope_diameter')->nullable();
            $table->string('model')->nullable();
            $table->string('execution')->nullable();
            $table->string('travel_motor_power')->nullable();
            $table->string('lifting_motor_power')->nullable();
            $table->string('voltage')->nullable();
            $table->string('brand_origin')->nullable();
            $table->string('travel_current')->nullable();
            $table->string('lifting_current')->nullable();
            $table->string('rotation_speed')->nullable();
            $table->string('travel_speed')->nullable();
            $table->string('lifting_speed')->nullable();
            $table->string('manufacturing_country')->nullable();
            $table->string('construction_height')->nullable();
            $table->string('travel_motor_type')->nullable();
            $table->string('lifting_motor_type')->nullable();
            $table->string('frequency')->nullable();
            $table->string('packing_width')->nullable();
            $table->string('width')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_characteristics');
    }
};
