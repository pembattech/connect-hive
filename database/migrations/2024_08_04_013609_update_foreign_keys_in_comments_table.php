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
        Schema::table('comments', function (Blueprint $table) {
            // Drop existing foreign keys
            $table->dropForeign(['PostID']);
            $table->dropForeign(['UserID']);
            $table->dropForeign(['ParentCommentID']);
            
            // Drop the columns if you need to recreate them with the correct references
            // $table->dropColumn('PostID');
            // $table->dropColumn('UserID');
            // $table->dropColumn('ParentCommentID');

            // Add foreign keys with correct references
            $table->unsignedBigInteger('PostID')->change();
            $table->foreign('PostID')->references('PostID')->on('posts')->onDelete('cascade');
            
            $table->unsignedBigInteger('UserID')->change();
            $table->foreign('UserID')->references('UserID')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('ParentCommentID')->nullable()->change();
            $table->foreign('ParentCommentID')->references('CommentID')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Drop the new foreign keys
            $table->dropForeign(['PostID']);
            $table->dropForeign(['UserID']);
            $table->dropForeign(['ParentCommentID']);
            
            // Optionally, restore the original foreign keys if they were referencing 'id'
            // $table->foreign('PostID')->references('id')->on('posts')->onDelete('cascade');
            // $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('ParentCommentID')->references('id')->on('comments')->onDelete('cascade');
        });
    }
};
