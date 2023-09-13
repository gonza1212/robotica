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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('local_id')->constrained('robots');
            $table->foreignId('visitor_id')->constrained('robots');
            $table->timestamp('start')->nullable();
            $table->tinyInteger('set')->unsigned()->default(1);
            $table->boolean('finished')->default(false);
            $table->tinyInteger('local_score')->unsigned()->default(0);
            $table->tinyInteger('visitor_score')->unsigned()->default(0);
            $table->string('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
