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
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->string('provider');     // midtrans/xendit/dll
            $table->string('channel')->nullable();      // qris, va_bca, gopay, dll
            $table->string('external_id')->nullable();  // id dari gateway
            $table->string('transaction_status')->default('pending');
            $table->decimal('amount', 12, 2);
            $table->json('payload')->nullable();        // response/raw webhook
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
