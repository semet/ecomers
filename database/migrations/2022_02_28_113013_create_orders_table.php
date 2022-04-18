<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('order_number');
            $table->uuid('customer_id');
            $table->decimal('total_price', 10, 2);
            $table->tinyInteger('payment_status')->default(1)->comment('1=menunggu pembayaran, 2=sudah dibayar, 3=kadaluarsa, 4=batal');
            $table->string('snap_token', 36)->nullable();
            $table->string('courier');
            $table->decimal('delivery_cost', 10, 2);
            $table->uuid('billing_address');
            $table->uuid('shipping_address')->nullable();// if it is NULL than it is the same as the billing address
            $table->integer('discount')->nullable();
            $table->boolean('delivered')->default(0);
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
