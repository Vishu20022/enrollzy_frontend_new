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
        Schema::create('mentor_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_profile_id')->constrained()->cascadeOnDelete();
            
            $table->boolean('new_booking_request')->default(true);
            $table->boolean('session_reminders')->default(true);
            $table->boolean('new_review_posted')->default(true);
            $table->boolean('weekly_analytics_digest')->default(true);
            $table->boolean('platform_announcements')->default(true);
            $table->boolean('whatsapp_notifications')->default(false);
            
            $table->string('notification_email')->nullable();
            $table->string('whatsapp_number')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_preferences');
    }
};
