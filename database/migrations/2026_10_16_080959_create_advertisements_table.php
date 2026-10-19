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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();

            $table->string('image');

            $table->enum('link_type', [
                'none',
                'product',
                'category',
                'brand',
            ])->default('product');

            $table->unsignedBigInteger('link_id')->nullable();

    $table->enum('position', [
        'top_banner',
        'bellowtop_banner',
        'middle_banner',
        'bellowmiddle_banner',
        'bottom_banner'
    ]);

            $table->unsignedInteger('sort_order')->default(1);

            $table->boolean('status')->default(true);
              $table->timestamp('start_at')->nullable();
        $table->timestamp('end_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
