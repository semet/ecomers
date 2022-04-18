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
        Schema::create('order_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('order_id');
            $table->integer('status_code');
            $table->string('status_message');
            $table->string('transaction_id');
            $table->string('payment_type');
            $table->timestamp('transaction_time');
            $table->string('transaction_status');
            $table->string('fraud_status')->nullable();
            $table->string('payment_code')->nullable();
            $table->string('pdf_url')->nullable();
            $table->string('finish_redirect_url')->nullable();
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
        Schema::dropIfExists('order_details');
    }
};
