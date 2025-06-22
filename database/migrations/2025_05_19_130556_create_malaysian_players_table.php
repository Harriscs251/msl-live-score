<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_malaysian_players_table.php

public function up()
{
    Schema::create('malaysian_players', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('goals')->default(0);
        $table->integer('matches_played')->default(0);
        $table->decimal('market_price', 10, 2); // e.g., 1.5 million
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('malaysian_players');
    }
};
