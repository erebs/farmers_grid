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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('address_id');
            $table->string('reference_id');
            $table->string('payment_type');
            $table->string('order_status')->default('pending');
            $table->string('payment_status')->default('pending');  ///migrate
            $table->string('ordered_on')->nullable();
            $table->string('delivered_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
