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
        Schema::table('mentor_verifications', function (Blueprint $table) {
            $table->text('gov_id_comment')->nullable();
            $table->text('linkedin_comment')->nullable();
            $table->text('background_check_comment')->nullable();
            $table->text('degree_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mentor_verifications', function (Blueprint $table) {
            $table->dropColumn([
                'gov_id_comment', 'linkedin_comment', 'background_check_comment', 'degree_comment'
            ]);
        });
    }
};
