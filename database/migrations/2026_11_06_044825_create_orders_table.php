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

    $table->foreignId('user_id')
        ->nullable()
        ->constrained()
        ->onDelete('cascade');

    // Order Number
    $table->string('order_number')->unique();

    // Order Note
    $table->text('notes')->nullable();

    // Totals
    $table->integer('total_items')->default(0);
    $table->decimal('subtotal', 10, 2)->default(0);
    $table->decimal('tax_amount', 10, 2)->default(0);
    $table->decimal('shipping_fee', 10, 2)->default(0);
    $table->decimal('discount_amount', 10, 2)->default(0);
    $table->decimal('grand_total', 10, 2)->default(0);

    // Payment
    $table->string('payment_method')->default('cod');
    $table->string('payment_status')->default('pending');

    // Order Status
    $table->enum('status', [
        'pending',
        'confirmed',
        'processing',
        'shipped',
        'delivered',
        'cancelled'
    ])->default('pending');

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