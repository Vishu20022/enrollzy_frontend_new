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
        Schema::table('hero_sliders', function (Blueprint $table) {
            $table->string('badge_text')->nullable();
            $table->string('heading')->nullable();
            $table->text('subheading')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('image_type')->nullable();
            
            $table->string('stat_1_count')->nullable();
            $table->string('stat_1_label')->nullable();
            $table->string('stat_2_count')->nullable();
            $table->string('stat_2_label')->nullable();
            $table->string('stat_3_count')->nullable();
            $table->string('stat_3_label')->nullable();
            $table->text('tags')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_sliders', function (Blueprint $table) {
            $table->dropColumn([
                'badge_text', 'heading', 'subheading', 'button_text', 'button_url', 'image_type',
                'stat_1_count', 'stat_1_label', 'stat_2_count', 'stat_2_label', 'stat_3_count', 'stat_3_label', 'tags'
            ]);
        });
    }
};
