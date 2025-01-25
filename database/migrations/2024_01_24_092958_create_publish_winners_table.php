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
        Schema::create('publish_winners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competition_id')->default(0);
            $table->unsignedBigInteger('photo_id')->default(0);
            $table->enum('place', ['first_runner_up', 'second_runner_up', 'special_jury_mention']);
            $table->timestamps();
            $table->foreign('competition_id')
                    ->references('id')
                    ->on('competitions')
                    ->onDelete('cascade');

            $table->foreign('photo_id')
                    ->references('id')
                    ->on('photographs')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publish_winners');
    }
};
