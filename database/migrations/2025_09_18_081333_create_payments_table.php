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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // foreign key eksplisit ke bookings
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')
                  ->references('id')
                  ->on('bookings')
                  ->onDelete('cascade');

            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['cash','transfer','e-wallet']);
            $table->enum('payment_status', ['pending','paid','failed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
