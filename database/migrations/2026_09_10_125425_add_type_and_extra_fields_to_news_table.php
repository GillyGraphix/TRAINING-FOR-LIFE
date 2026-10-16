<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('type')->default('news')->after('id'); // news, event, publication, report, media
            $table->string('file')->nullable()->after('image');   // PDF/download kwa Publications & Reports
            $table->date('event_date')->nullable()->after('published_at');
            $table->string('location')->nullable()->after('event_date');
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn(['type', 'file', 'event_date', 'location']);
        });
    }
};