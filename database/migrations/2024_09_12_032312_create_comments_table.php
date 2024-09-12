<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('CommentID')->unsigned();
            $table->bigInteger('PostID')->unsigned();
            $table->bigInteger('UserID')->unsigned();
            $table->text('Content');
            $table->bigInteger('ParentCommentID')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('UserID')->references('id')->on('users');
            $table->foreign('PostID')->references('PostID')->on('posts')->onDelete('cascade');
            $table->foreign('ParentCommentID')->references('CommentID')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
