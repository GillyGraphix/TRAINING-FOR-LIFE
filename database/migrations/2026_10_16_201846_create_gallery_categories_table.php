<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gallery_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 50)->unique();
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Hamisha categories zilizopo sasa kutoka kwenye code kwenda database.
        $now = now();

        DB::table('gallery_categories')->insert([
            [
                'name' => 'Community Outreach',
                'slug' => 'outreach',
                'description' => 'Educational seminars, health awareness campaigns, and community engagement programs across local villages.',
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Clinical Care & Support',
                'slug' => 'clinical',
                'description' => 'Health check-ups, specialized consultations, and medical assistance provided by our expert practitioners.',
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Empowerment & Impact',
                'slug' => 'empowerment',
                'description' => 'Workshops, maternal welfare sessions, and initiatives designed to build sustainable community growth.',
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'TFL Farm & Agriculture',
                'slug' => 'agriculture',
                'description' => 'Hands-on training in smart farming, greenhouse management, and agribusiness for youth sustainability.',
                'sort_order' => 4,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Community Members',
                'slug' => 'members',
                'description' => 'The inspiring faces of our youth, mentors, staff, and the resilient individuals driving change in our society.',
                'sort_order' => 5,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_categories');
    }
};