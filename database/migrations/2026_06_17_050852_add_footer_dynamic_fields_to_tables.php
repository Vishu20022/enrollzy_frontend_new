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
        Schema::table('footer_menus', function (Blueprint $table) {
            $table->boolean('show_view_all')->default(false);
            $table->string('view_all_link')->nullable();
            $table->string('bottom_badge_text')->nullable();
            $table->string('bottom_badge_subtext')->nullable();
            $table->string('bottom_badge_icon')->nullable();
            $table->string('bottom_badge_rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'play_store_link', 'app_store_link', 'toll_free_number',
                'whatsapp_number', 'footer_qr_image', 'facebook_url',
                'twitter_url', 'instagram_url', 'linkedin_url', 'youtube_url',
                'footer_description'
            ]);
        });

        Schema::table('footer_menus', function (Blueprint $table) {
            $table->dropColumn([
                'show_view_all', 'view_all_link', 'bottom_badge_text',
                'bottom_badge_subtext', 'bottom_badge_icon', 'bottom_badge_rating'
            ]);
        });
    }
};
