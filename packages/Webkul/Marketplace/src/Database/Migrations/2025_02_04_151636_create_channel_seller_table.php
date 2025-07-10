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
        Schema::create('channel_seller', function (Blueprint $table) {
            $table->unsignedInteger('channel_id');
            $table->unsignedInteger('seller_id');

            $table->foreign('channel_id')
                ->references('id')
                ->on('channels')
                ->cascadeOnDelete();

            $table->foreign('seller_id')
                ->references('id')
                ->on('marketplace_sellers')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channel_seller');
    }
};
