<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('address');
            $table->decimal('total', 12, 2);

            // status untuk pembayaran
            $table->enum('status', ['unpaid', 'waiting_verification', 'processed', 'failed', 'cancelled'])
                  ->default('unpaid');

            // status order (alur pemesanan)
            $table->enum('status_order', ['pending', 'paid', 'verified',  'rejected', 'cancelled'])
                  ->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

