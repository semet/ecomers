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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('artist_id');
            $table->uuid('store_id');
            $table->string('code_number')->unique();
            $table->string('slug')->unique();
            $table->string('brand')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->longText('details')->nullable();
            $table->string('old_price')->nullable();
            $table->string('latest_price');
            $table->integer('amount');
            $table->integer('weight');
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('high')->nullable();
            $table->string('color_family')->nullable();
            $table->integer('view')->nullable();
            $table->integer('like')->nullable();
            $table->integer('sold')->nullable(); //how many sold
            $table->boolean('discounted')->default(0); //is it on discount?
            $table->integer('discounted_amount')->nullable(); // if it is doscounted, how much?
            $table->string('size', 10)->nullable();
            // $table->boolean('published')->default(0);
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
        Schema::dropIfExists('products');
    }
};
