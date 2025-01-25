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
        Schema::create('photographs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  
            $table->string('device')->nullable();  
            $table->string('captured_location')->nullable();  
            $table->string('year')->nullable();  
            $table->string('month')->nullable();  
            $table->text('description')->nullable();  
            $table->text('image')->nullable();
            $table->boolean('is_tc_accepted')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photographs');
    }
};
