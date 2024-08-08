<?php

use App\Models\User;
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
            $table->foreignIdFor(User::class)->constrained();
            $table->string('shipment_number')->unique();
            $table->foreignId('pickup_address_id')->constrained('addresses');
            $table->string('delivery_reference')->nullable();
            $table->date('pickup_date');
            $table->string('pickup_time');
            $table->string('note_for_pickup_driver')->nullable();
            $table->string('delivery_name');
            $table->string('delivery_email')->nullable();
            $table->string('delivery_phone_number')->nullable();
            $table->foreignId('delivery_country_id')->constrained('countries');
            $table->foreignId('delivery_city_id')->constrained('cities');
            $table->foreignId('delivery_area_id')->constrained('areas');
            $table->string('delivery_address');
            $table->string('delivery_note')->nullable();
            $table->foreignId('shipping_type_id')->constrained('shipping_types');
            $table->foreignId('shipping_status_id')->nullable()->constrained('shipping_statuses');
            $table->foreignId('payment_method_id')->constrained('payment_methods');
            $table->foreignId('courier_id')->nullable()->constrained('users');
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
