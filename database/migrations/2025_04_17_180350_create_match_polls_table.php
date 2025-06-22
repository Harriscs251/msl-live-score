<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('match_polls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('fixture_id'); // from API
            $table->enum('vote', ['home', 'away', 'draw']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // 🔒 Add this line to prevent duplicate votes for same match by same user
            $table->unique(['user_id', 'fixture_id']);
        });
    }

};
