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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('shipment_number')->unique();
            $table->string('pickup_name');
            $table->foreignId('pickup_country_id')->constrained('countries');
            $table->foreignId('pickup_city_id')->constrained('cities');
            $table->foreignId('pickup_area_id')->constrained('areas');
            $table->string('pickup_address');
            $table->datetime('pickup_datetime');
            $table->string('note_for_pickup_driver')->nullable();
            $table->string('delivery_name');
            $table->foreignId('delivery_country_id')->constrained('countries');
            $table->foreignId('delivery_city_id')->constrained('cities');
            $table->foreignId('delivery_area_id')->constrained('areas');
            $table->string('delivery_address');
            $table->datetime('delivery_datetime');
            $table->foreignId('shipping_type_id')->constrained('shipping_types');
            $table->foreignId('shipping_status_id')->constrained('shipping_statuses');
            $table->foreignId('payment_method_id')->constrained('payment_methods');
            $table->foreignId('courier_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
