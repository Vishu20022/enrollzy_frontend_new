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
        Schema::create('mentor_pricing_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_profile_id')->constrained()->cascadeOnDelete();
            $table->integer('fee_30_min')->nullable();
            $table->integer('fee_60_min')->nullable();
            $table->boolean('offer_free_first_session')->default(false);
            $table->integer('pro_bono_sessions')->default(0);
            $table->string('payout_method')->nullable();
            $table->string('upi_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_pricing_details');
    }
};
