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
        Schema::create('race_pilots', function (Blueprint $table) {
            $table->foreignId('race_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('pilot_id')
                ->constrained()
                ->onDelete('cascade');
            $table->primary(['race_id', 'pilot_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_pilots');
    }
};
