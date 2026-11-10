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
    Schema::table('orders', function (Blueprint $table) {
        $table->string('customer_name')->nullable();
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->text('delivery_address')->nullable();
        $table->string('city')->nullable();
        $table->string('province')->nullable();
        $table->string('postal_code')->nullable();
    });
}

public function down(): void
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn([
            'customer_name',
            'email',
            'phone',
            'delivery_address',
            'city',
            'province',
            'postal_code',
        ]);
    });
}

};
