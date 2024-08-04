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
            // Drop the existing foreign key constraints
            $table->dropForeign(['UserID']);
            
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['UserID']);
            
            // // Restore the original foreign key constraints if necessary
            // $table->foreign('PostID')->references('PostID')->on('posts')->onDelete('cascade');
            // $table->foreign('UserID')->references('UserID')->on('users')->onDelete('cascade');
            // $table->foreign('ParentCommentID')->references('CommentID')->on('comments')->onDelete('cascade');
        });
    }
};

