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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('customer_number')->nullable();
            $table->foreignId('delivery_country_id')->constrained('countries');
            $table->foreignId('delivery_city_id')->constrained('cities');
            $table->foreignId('delivery_area_id')->constrained('areas');
            $table->string('street_address');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_pickup')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
