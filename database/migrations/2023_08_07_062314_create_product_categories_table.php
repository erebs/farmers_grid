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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title_eng');
            $table->string('title_mal');
            $table->string('title_eng_mal');
            $table->longText('description_eng');
            $table->longText('description_mal');
            $table->string('image');
            $table->string('featured')->default(0);
            $table->string('trending')->default(0);
            $table->string('dis_order');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
