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
        Schema::create('ordereditems', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('customer_id');
            $table->string('unit_id');
            $table->string('quantity');
            $table->double('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordereditems');
    }
};
