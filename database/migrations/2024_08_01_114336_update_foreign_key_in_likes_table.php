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
        Schema::table('likes', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['PostID']);

            $table->foreign('PostID')->references('new_column')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('likes', function (Blueprint $table) {
            // Drop the newly added foreign key constraint
            $table->dropForeign(['PostID']);

            // Re-add the original foreign key constraint
            // Assuming the original referenced column was 'id' in 'posts'
            $table->foreign('PostID')->references('id')->on('posts')->onDelete('cascade');
        });
    }
};
