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
        Schema::create('mentor_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_profile_id')->constrained()->cascadeOnDelete();
            $table->string('job_title');
            $table->string('company');
            $table->string('industry');
            $table->string('years_of_experience');
            $table->integer('start_year');
            $table->integer('end_year')->nullable();
            $table->boolean('is_current')->default(false);
            $table->string('linkedin_url')->nullable();
            $table->text('achievements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_experiences');
    }
};
