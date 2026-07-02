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
        Schema::create('mentor_mentorship_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_profile_id')->constrained()->cascadeOnDelete();
            $table->json('areas_of_mentorship')->nullable();
            $table->json('target_mentee_levels')->nullable();
            $table->json('session_formats')->nullable();
            $table->json('session_durations')->nullable();
            $table->string('preferred_platform')->nullable();
            $table->text('mentoring_style')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_mentorship_details');
    }
};
