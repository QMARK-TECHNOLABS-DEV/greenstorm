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
        Schema::table('competitions', function (Blueprint $table) {
            $table->boolean('is_published_for_vote')->nullable()->default(false)->after('status');
            $table->datetime('vote_published_date')->nullable()->after('is_published_for_vote');
            $table->datetime('vote_last_published_date')->nullable()->after('vote_published_date');
            $table->integer('vote_publish_count')->default(0)->after('vote_last_published_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->dropColumn('is_published_for_vote');
            $table->dropColumn('vote_published_date');
            $table->dropColumn('vote_last_published_date');
            $table->dropColumn('vote_publish_count');
        });
    }
};
