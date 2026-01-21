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
            $table->unsignedBigInteger('customer_id')->index();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->datetime('order_date');
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('vat_amount', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->boolean('vetenery_approved')->default(false);
            $table->unsignedBigInteger('sales_approved_by')->index();
            $table->dateTime('sales_approved_date')->nullable();
            $table->unsignedBigInteger('accounts_approved_by')->index();
            $table->dateTime('accounts_approved_date')->nullable();
            $table->unsignedBigInteger('warehouse_user_id')->index();
            $table->dateTime('warehouse_dispatched_date')->nullable();
            $table->enum('order_status', [
                'pending',
                'sales_approved',
                'accounts_approved',
                'ready_for_dispatch',
                'warehouse_dispatched',
                'delivered',
                'cancelled'
            ])->default('pending');
            $table->text('notes')->nullable();
            $table->softDeletes();
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
