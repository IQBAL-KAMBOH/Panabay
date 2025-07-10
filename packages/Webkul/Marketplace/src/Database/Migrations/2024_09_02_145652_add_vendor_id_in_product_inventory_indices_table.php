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
        if (Schema::hasColumn('product_inventory_indices', 'vendor_id')) {
            return;
        }

        Schema::table('product_inventory_indices', function (Blueprint $table) {
            $table->integer('vendor_id')->default(0)->after('product_id');

            $table->dropForeign(['product_id']);
            $table->dropForeign(['channel_id']);

            $table->dropUnique(['product_id', 'channel_id']);

            $table->unique(
                ['product_id', 'channel_id', 'vendor_id'],
                'inventory_index_channel_vendor_unique'
            );

            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('channel_id')->references('id')->on('channels')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
