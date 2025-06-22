<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('favorite_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('team_id'); // Store API team ID
            $table->string('team_name');
            $table->string('team_logo')->nullable();
            $table->timestamps();
            
            // Each user can only favorite a team once
            $table->unique(['user_id', 'team_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorite_teams');
    }
};