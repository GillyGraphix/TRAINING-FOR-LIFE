<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('video')->nullable()->after('file');               // faili la video lililopakiwa
            $table->string('youtube_url')->nullable()->after('video');        // link ya YouTube
            $table->string('video_source')->nullable()->after('youtube_url'); // 'upload' au 'youtube'
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn(['video', 'youtube_url', 'video_source']);
        });
    }
};