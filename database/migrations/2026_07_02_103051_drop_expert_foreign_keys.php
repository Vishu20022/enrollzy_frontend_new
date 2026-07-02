<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('expert_slots', function (Blueprint $table) {
            $table->dropForeign(['expert_id']);
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['expert_id']);
        });
        Schema::table('payments', function (Blueprint $table) {
            // No expert_id foreign key in payments, it's booking_id and user_id.
        });
    }

    public function down(): void
    {
        // Not necessary for this quick fix
    }
};
