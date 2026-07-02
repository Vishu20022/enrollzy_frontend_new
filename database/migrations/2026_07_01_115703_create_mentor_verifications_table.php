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
        Schema::create('mentor_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_profile_id')->constrained()->cascadeOnDelete();
            
            // Government ID
            $table->string('gov_id_path')->nullable();
            $table->enum('gov_id_status', ['not_submitted', 'pending', 'verified', 'rejected'])->default('not_submitted');
            
            // LinkedIn
            $table->enum('linkedin_status', ['not_submitted', 'pending', 'verified', 'rejected'])->default('not_submitted');
            
            // Background Check
            $table->enum('background_check_status', ['not_submitted', 'pending', 'verified', 'rejected'])->default('not_submitted');
            
            // Degree Certificates
            $table->enum('degree_status', ['not_submitted', 'pending', 'verified', 'rejected'])->default('not_submitted');
            
            // Platform Agreement
            $table->boolean('platform_agreement_signed')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_verifications');
    }
};
