<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->unsignedBigInteger('order_id')->nullable(false)->after('id');
            $table->unsignedBigInteger('payment_type_id')->nullable(false)->after('order_id');

            $table->foreign('payment_type_id')->references('id')->on('payment_types');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('name');
            $table->dropColumn('order_id');
            $table->dropColumn('payment_type_id');
        });
    }
};
