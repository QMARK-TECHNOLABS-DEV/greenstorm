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
            $table->boolean('is_public_vote_completed')->nullable()->default(false)->after('vote_last_published_date');
            $table->date('public_vote_completed_date')->nullable()->after('is_public_vote_completed');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->dropColumn('is_public_vote_completed');
            $table->dropColumn('public_vote_completed_date');
        });
    }
};
