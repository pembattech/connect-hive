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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('PostID');
            $table->foreignId('UserID')->constrained('users');
            $table->text('Content');
            $table->string('ImageURL')->nullable();
            $table->string('VideoURL')->nullable();
            $table->timestamps(); // includes CreatedDate and UpdatedDate
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
