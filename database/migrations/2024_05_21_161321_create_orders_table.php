<?php

use App\Enums\OrderDeliveryStatus;
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
            $table->longText('shipping_address');
            $table->string('coupon_code')->nullable();
            $table->string('tracking_code')->unique();
            $table->double('grand_total');
            $table->double('tax', 20, 2)->default(0.00);
            $table->double('shipping_cost', 20, 2)->default(0.00);
            $table->integer('delivery_status')->default(OrderDeliveryStatus::PENDING);
            $table->string('cancelled_reason')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('completed_at')->nullable();
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
