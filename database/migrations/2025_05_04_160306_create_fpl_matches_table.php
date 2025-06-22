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
    Schema::create('fpl_matches', function (Blueprint $table) {
        $table->id();
        $table->string('team1');
        $table->string('team2');
        $table->integer('score1');
        $table->integer('score2');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('fpl_matches');
}

};
