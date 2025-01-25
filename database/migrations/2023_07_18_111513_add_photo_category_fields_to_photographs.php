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
        Schema::table('photographs', function (Blueprint $table) {
            $table->unsignedBigInteger('photo_category')->after('photo_unique_id');
            $table->foreign('photo_category', 'fk_photographs_photo_category')
                  ->references('id')
                  ->on('photo_categories')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photographs', function (Blueprint $table) {
            $table->dropColumn('photo_category');
        });
    }
};
