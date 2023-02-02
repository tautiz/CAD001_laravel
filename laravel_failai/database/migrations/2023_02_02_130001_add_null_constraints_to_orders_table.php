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
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id')->nullable()->change();
            $table->unsignedBigInteger('status_id')->nullable()->change();
            $table->unsignedBigInteger('shipping_address_id')->nullable()->change();
            $table->unsignedBigInteger('billing_address_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id')->nullable(false)->change();
            $table->unsignedBigInteger('status_id')->nullable(false)->change();
            $table->unsignedBigInteger('shipping_address_id')->nullable(false)->change();
            $table->unsignedBigInteger('billing_address_id')->nullable(false)->change();
        });
    }
};
