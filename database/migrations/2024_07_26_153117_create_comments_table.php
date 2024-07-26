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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('CommentID');
            $table->foreignId('PostID')->constrained('posts');
            $table->foreignId('UserID')->constrained('users');
            $table->text('Content');
            $table->timestamps(); // includes CreatedDate
            $table->foreignId('ParentCommentID')->nullable()->constrained('comments');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
