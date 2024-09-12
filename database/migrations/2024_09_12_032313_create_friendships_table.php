<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendships', function (Blueprint $table) {
            $table->bigIncrements('FriendshipID')->unsigned();
            $table->bigInteger('UserID1')->unsigned();
            $table->bigInteger('UserID2')->unsigned();
            $table->string('Status');
            $table->timestamps();

            $table->foreign('UserID1')->references('id')->on('users');
            $table->foreign('UserID2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friendships');
    }
}
