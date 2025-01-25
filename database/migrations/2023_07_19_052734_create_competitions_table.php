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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->year('year');
            $table->string('period'); 
            $table->text('prizes_described')->nullable();
            $table->datetime('vote_date')->nullable();
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->datetime('prize_announcement_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
