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
            $table->unsignedBigInteger('user_id');
            $table->string('order_code')->unique();
            $table->decimal('total_amount', 10, 2);
            $table->string('status')->default('pending');
            $table->string('payment_method');
            $table->text('shipping_address');
            $table->text('billing_address')->nullable();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
