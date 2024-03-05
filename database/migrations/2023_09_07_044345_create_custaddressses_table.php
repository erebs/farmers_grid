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
        Schema::create('custaddressses', function (Blueprint $table) {
            $table->id();
            $table->string('cust_id');
            $table->string('name');
            $table->bigInteger('mobile');
            $table->string('address');
            $table->string('district');
            $table->string('state');
            $table->string('pincode');
            $table->string('landmark');   //sometimes nullable
            $table->string('default')->default(0);  //need to migrate here
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custaddressses');
    }
};
