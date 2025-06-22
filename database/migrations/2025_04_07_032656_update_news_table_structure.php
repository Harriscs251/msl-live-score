<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            // Add missing columns
            if (!Schema::hasColumn('news', 'title')) {
                $table->string('title');
            }
            if (!Schema::hasColumn('news', 'content')) {
                $table->text('content');
            }
            if (!Schema::hasColumn('news', 'image1')) {
                $table->string('image1');
            }
            if (!Schema::hasColumn('news', 'image2')) {
                $table->string('image2')->nullable();
            }
            if (!Schema::hasColumn('news', 'image3')) {
                $table->string('image3')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            // If needed, remove the columns in a rollback
            $table->dropColumn(['title', 'content', 'image1', 'image2', 'image3']);
        });
    }
};