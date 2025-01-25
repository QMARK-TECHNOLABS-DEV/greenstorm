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
        Schema::create('stage_review_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('photo_id')->default(0);
            $table->unsignedBigInteger('stage_id')->default(0);
            $table->unsignedBigInteger('reviewer_id')->default(0);
            $table->boolean('eliminate')->nullable();
            $table->float('score')->nullable();
            $table->timestamps();

            $table->foreign('photo_id')
                  ->references('id')
                  ->on('photographs')
                  ->onDelete('cascade');

            $table->foreign('stage_id')
                  ->references('id')
                  ->on('stages')
                  ->onDelete('cascade');

            $table->foreign('reviewer_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stage_review_status');
    }
};
