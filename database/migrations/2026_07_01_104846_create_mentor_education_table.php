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
        Schema::create('mentor_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_profile_id')->constrained()->cascadeOnDelete();
            $table->string('degree_type');
            $table->string('specialisation')->nullable();
            $table->string('institution');
            $table->integer('year_of_graduation');
            $table->string('degree_certificate')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_educations');
    }
};
